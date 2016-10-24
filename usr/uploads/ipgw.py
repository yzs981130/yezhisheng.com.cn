#!/usr/bin/env python3
import requests
import getpass
import re
import sys
import json
import base64

def showText(t):
    print('================MESSAGE START================')
    lt = t.split('\n')
    for i in lt:
        i = str(i).strip()
        if len(i)>20:
            print(i)
    print('================MESSAGE   END================')

def checkStatus(code):
    print('Status code:'+str(code))
    if code >= 400:
        print("Error occurs")
        exit(1)

itsUrl         = 'https://its.pku.edu.cn'
ipgwLoginUrl   = itsUrl + '/cas/webLogin'
ipgwResultUrl  = itsUrl + '/netportal/ipgwResult.jsp'
ipgwFreeUrl    = itsUrl + '/netportal/ITSipgw?cmd=open&type=free'
ipgwGlobalUrl  = itsUrl + '/netportal/ITSipgw?cmd=open&type=fee'
ipgwDisThisUrl = itsUrl + '/netportal/ITSipgw?cmd=close&type=self'
ipgwDisAllUrl  = itsUrl + '/netportal/ITSipgw?cmd=close&type=all'
ipgwGetAllCon  = itsUrl + '/netportal/ITSipgw?cmd=getconnections'
ipgwNoLoginDis = itsUrl + '/cas/ITSweb?cmd=close'

try:
    configFile = open('ipgw.json','r')
except FileNotFoundError:
    configFile = open('ipgw.json','w')
    configFile.write('{\n    "id":"<Your ID>",\n')
    configFile.write('    "pw":"<Base64 of your password(or empty for not saving password)>",\n')
    configFile.write('    "ir":"no"\n}')
    print('Please check your ipgw.json')
    exit(1)
config = json.load(configFile)
configFile.close()

userName = config['id']
userPass = base64.b64decode(config['pw'])
userIpRg = config['ir']

print('User ID: ' + userName)
print('Global: ' + userIpRg)
print('Please enter your password(or "d" to disconnect this device).')
print('If you saved your password, press ENTER.')
inputPass = getpass.getpass('Password: ')
if inputPass != '':
    userPass = inputPass
if inputPass == 'd':
    r = requests.get(ipgwNoLoginDis)
    checkStatus(r.status_code)
    print(r.text)
    exit(0)

requestArgs = {'username':userName,'password':userPass,'iprange':userIpRg }

s = requests.Session()
r = s.get(itsUrl)
checkStatus(r.status_code)
r = s.post(ipgwLoginUrl,requestArgs)
checkStatus(r.status_code)
t = str(r.text)
if t.find('重新连接免费地址')==-1:
    print('Login failed!')
    try:
        reason = re.search('(<p id="input_tip" style=.*>)(.*)(</p>.*</form>)',t,re.S).group(2)
    except:
        reason = 'Unknown error.Please see log.html'
    print('Reason:  ' +  reason)
    f = open('log.html','w')
    f.write(t)
    f.close()
    exit(1)

r = s.get(ipgwResultUrl)
checkStatus(r.status_code)
showText(str(r.text))

cmd=''
while cmd!='q':
    print('Command:')
    print('(f):Switch to free mode (g):Switch to global(paid) mode')
    print('(s):Show all (d):Disconnect (a):Disconnect all (q):Disconnect and quit')

    try:
        cmd = input()
    except KeyboardInterrupt:
        print('Interrupted. Disconnecting now...')
        cmd = 'q'

    validCommand = True

    if cmd == 'f':
        r = s.get(ipgwFreeUrl)
    elif cmd == 'g':
        r = s.get(ipgwGlobalUrl)
    elif cmd == 'd' or cmd=='q':
        r = s.get(ipgwDisThisUrl)
    elif cmd == 'a':
        r = s.get(ipgwDisAllUrl)
    elif cmd == 's':
        r = s.get(ipgwGetAllCon)
    else:
        print('Invalid command!')
        validCommand = False

    if validCommand:
        checkStatus(r.status_code)
        showText(str(r.text))
