#!/usr/bin/python3

import socket
import select
import threading
import sys

#CRÉEATION DE LA SOCKET
scket = socket.socket(socket.AF_INET, socket.SOCK_STREAM, 0)
#ajout de setsockopt pour définir les options sur le socket
scket.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
#la methode bind pour greffer la socket au port 1459
try:
    scket.bind(('', 1459))
except:
    print("the connection of the socket to the chosen address failed")
    sys.exit
print("serveur pret est en ecoute des connexion")
scket.listen(1)
#un dico de client associe a son cannal
clients_channels = {}
#une liste des canaux
member_in_channels = {}
#listes des clients
socketl = []
#dico avec comme key la socket et comme valeur nick du client
laddress = {}
 

#pour gerer tout genre de message
def gestionMessage(adress_recp, msg):
    adress_recp.sendall(msg.encode())

#fonction qui cree un nickname d'un client
def nick_client(sock_nick, nick):
    if nick[0] == "/":
        gestionMessage(connection, "nick incorrect choose an other nick please \n")
    else:
        laddress[connection] = nick

#fonction qui renvoi l'adresse d'un client
def getadress(client):
    for key in socketl:
        if laddress[key] == client:
            return key
#fonction qui supprime un channel

def supprimChanel(channel):
    del member_in_channels[channel]
#fonction qui recuppere l'administrateur d'un cannal

def getAdmin(channel):
    return member_in_channels[channel][0]

#fonction pour quiter un cannal
def quiterchannel(client, channel):
    longu = len(member_in_channels[channel])
    if longu == 1:
        del member_in_channels[channel]
    else:
        member_in_channels[channel].remove(client)
    del clients_channels[client]

#pour rejoindre un cannal
def rejoindreCanal(sock_client, channel):
    if len(channel) == 0:
        gestionMessage(connection,"invalid channel name \ n")
    else:
        client = laddress[sock_client]
        if client in clients_channels:
            gestionMessage(sock_client, "you are already a member of a channel \n")
        else:
            comp = -1
            retour = False
            for string in member_in_channels:
                comp += 1
                if channel == string and client not in member_in_channels[channel]:
                    member_in_channels[channel].append(client)
                    retour = True

            if retour == False:
                member_in_channels[channel]= [client]
            clients_channels[client] = channel

#la liste des cannaux
def listeCannaux(sock_client, client):
    if len (client) == 0:
        gestionMessage(connection, "please choose a nick first \n")
    else:
        for channel in member_in_channels:
            les_channels = (" {} \n".format(channel))
            gestionMessage(sock_client, les_channels)
            #client.sendall(les_channels)

#La liste des clients d'un cannal
def liste_client(adress_client):
    liste = []
    nick = laddress[connection]
    if nick not in clients_channels:
        gestionMessage(connection, "please choose a channel first \n")
    else :
        channel = clients_channels[nick]
        adminu = getAdmin(channel)
        if nick not in member_in_channels[channel]:
            gestionMessage(connection, "please choose a channel first \n")
        else:
            for x in member_in_channels[channel]:
                liste.append(x)

            a = liste[0]
            liste.remove(a)
            ladm = ("@{}@".format(adminu))
            liste.insert(0,ladm)
            les_client = (" {} \n".format(liste))
            adress_client.sendall(les_client.encode())

#pour se deconnecter
def sedeconnecter(client):
    client.sendall("good bye amigo \n".encode())
    client.close()
    socketl.remove(client)

#pour enlever un client dans un cannal
def ejecterclient(admin, client,channel):
    if client in member_in_channels[channel]:
        quiterchannel(client, channel)

#pour renommer un cannal
def rennomChannel(admin, oldchannel, newchannel):
    for x in member_in_channels:
        if x == oldchannel:
            member_in_channels[newchannel] = member_in_channels[oldchannel]
            del member_in_channels[oldchannel]
            for z in clients_channels:
                clients_channels[z] = newchannel
                
def msgchannel(client,  channe, msgCh):
    y = getadress(client)
    for l in member_in_channels[channe]:
        x = getadress(l)
        if y != x:
            gestionMessage(x,msgCh)

def commandHelp(sock_client):
    msg = """print this message
        * /LIST: list all available channels on server
        * /JOIN <channel>: join (or create) a channel
        * /LEAVE: leave current channel
        * /WHO: list users in current channel
        * <message>: send a message in current channel
        * /MSG <nick> <message>: send a private message in current channel
        * /BYE: disconnect from server
        * /KICK <nick>: kick user from current channel [admin]
        * /REN <channel>: change the current channel name [admin] \n"""
    gestionMessage(sock_client,msg)

def gestionCommande(sock_client, msgdata):
    
    if msgdata[0] == "/":
        msgclient_decode = msgdata[1:]
        splited = msgclient_decode.split(" ")
        taille = len(msgclient_decode)
        cmd3 = msgclient_decode[:3]
        cmd4 =  msgclient_decode[:4]
        cmd5 = msgclient_decode[:5]
        cmd7 = msgclient_decode[:7]
        
        if cmd4 == "LIST":
            nick = laddress[connection]
            listeCannaux(connection, nick)

        if cmd4 == "JOIN":
            string = splited[1]
            #appelle de la fonction rejoindre canal
            rejoindreCanal(connection, string)

        if cmd3 == "WHO":
            #appelle de la fonction list_client
            liste_client(connection)

        if cmd3 == "BYE":
            #appelle de la fonction sedeconnecter
            sedeconnecter(connection)
        elif  cmd5 == "LEAVE":
            nick = laddress[connection]
            if nick not in clients_channels:
                estionMessage(connection, "you are not in a channel \ n")
            else:
                key_nick = clients_channels[nick]
                #appelle de la fonction quiterchannel
                quiterchannel(nick, key_nick)

        elif cmd4 == "KICK":
            nick = laddress[connection]
            client_ejec = msgclient_decode[5:taille-1]
            channel = clients_channels[client_ejec]
            adminu = getAdmin(channel)
            if nick != adminu:
                gestionMessage(connection, "sorry you are not a adminis \ n")
            elif len(client_ejec) == 0:
                gestionMessage(connection, "channel name invalid \ n")
            else:
                #appelle de la fonction ejecterclient
                ejecterclient(adminu, client_ejec,channel)

        elif cmd3 == "REN":
            channel_reno = splited[1]
            nick = laddress[connection]
            channel = clients_channels[nick]
            adminu = getAdmin(channel)
            if nick != adminu:
                gestionMessage(connection, "sorry you are not a adminis \ n")
            elif len(channel_reno) == 0:
                gestionMessage(connection, "channel name invalid \ n")
            elif channel_reno in member_in_channels:
                gestionMessage(connection, "this channel already exists please choose another \ n")
            else :
                #appelle de la fonction renommchannel
                rennomChannel(nick, channel, channel_reno)
        elif cmd4 == "HELP":
            commandHelp(connection)

        elif cmd3 == "MSG":
            nick = laddress[connection]
            lon = len(splited[1])+5
            recep = splited[1]
            y= getadress(recep)
            lon_chaine = lon - taille
            j = (msgclient_decode[lon_chaine:])
            channel = clients_channels[nick]
            msgcli = nick + " -> "+ j
            #Appelle de la fonction de gestion de message
            if recep not in member_in_channels[channel]:
                gestionMessage(connection, "sorry you are not in the same channel\ n")
            elif len(j) == 0:
                gestionMessage(connection, "please enter a message\ n")
            else:
                #FONCTION QUI ENVOIE UN MESSAGE A UN CLIENT DONNÉ
                gestionMessage(y, msgcli)
        else:
            gestionMessage(connection, "use the HELP command to know how to use the command\ n")

    else:
        nick = laddress[connection]
        if nick not in clients_channels:
            gestionMessage(connection, "you are not in a channel \n")
        else:
            mychannel = clients_channels[nick]
            j = msgdata[0:]
            msgcli = nick + " -> "+ j
            msgchannel(nick,mychannel,msgcli)



while True:
    connection_demandee, wlist, rlist = select.select(socketl+[scket], [], [])
    for connection in connection_demandee:
        if (connection == scket):
            connection , infoclient = connection.accept()
            gestionMessage(connection, "please enter another nick \n")
            socketl.append(connection)
        else:
            msgclient = connection.recv(1500)
            data = msgclient.decode()
            #message vide
            if (len (data) == 0):
                sedeconnecter(connection)

            else:
                if connection not in laddress:
                    client = data[:-1]
                    if client in clients_channels:
                        gestionMessage(connection, "please enter another nick \n")
                    else:
                        nick_client(connection, client)

                else:
                    gestionCommande(connection, data)