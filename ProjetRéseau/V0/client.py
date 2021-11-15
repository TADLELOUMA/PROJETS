#!/usr/bin/python3
#coding:UTF_8

import socket
import sys
import select
import threading

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
                #s.sendall(b"BYE")
                #s.close()
                sys.exit()
                break
            print(string.decode())
        else:
            # pour ne pas mettre le /
            data = sys.stdin.readline()
            #cmd = data[:1]
            s.send(data.encode())                

           

   
