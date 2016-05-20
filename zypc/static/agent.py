#!/usr/bin/env python
# coding=utf-8

import uuid
import time
import urllib2

heartbeat = 10
url = 'http://ims.smartxupt.com/sign_action.php?agent='

agentid = uuid.UUID(int = uuid.getnode()).hex[-12:]
url = url + agentid

while(1):
    # send the request
    try:
        res = urllib2.urlopen(url)
        #print res.read()
    except:
        #print "err"
        pass

    time.sleep(heartbeat)
