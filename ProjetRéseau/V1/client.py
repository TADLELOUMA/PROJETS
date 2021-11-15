#!/usr/bin/python3
#coding:UTF_8

import socket
import sys
import select


host = "localhost"  # recuperation du nom de serveur
try:
    s = socket.socket(socket.AF_INET,socket.SOCK_STREAM) # creation de la socket nommé s
    s.connect((host,1459)) # connection au serveur
except socket.error as er: # gestion des erreurs
    s = None
    raise er

while True:
    list_events,_,_ = select.select([sys.stdin, s], [] , [])
    for r in list_events:
        if r == s:
            string = s.recv(1500)
            if len(string) == 0:
                sys.exit()
                break
            print(string.decode())
        else:
            data = sys.stdin.readline()
            s.send(data.encode())                

           

   
