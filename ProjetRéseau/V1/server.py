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
current_chanel = {}
channel_Admin = {} #un channel et la liste de tous ces administrateur
client_contenu = {} # un client et le contenu d'un fichier


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

# def getAdmin(channel):
#     return member_in_channels[channel][0]

    #la liste des cannaux
def listeCannaux(sock_client, client):
    if len (client) == 0:
        gestionMessage(connection, "please choose a nick first \n")
    else:
        for channel in member_in_channels:
            les_channels = (" {} \n".format(channel))
            gestionMessage(sock_client, les_channels)

#pour rejoindre un cannal
def rejoindreCanal(sock_client, channel):
    if len(channel) == 0:
        gestionMessage(connection,"invalid channel name \ n")
    else:
        client = laddress[sock_client]
        comp = -1
        retour = False
        for string in member_in_channels:
            comp += 1
            if channel == string and client not in member_in_channels[channel]:
                member_in_channels[channel].append(client)
                retour = True

        if retour == False:
            member_in_channels[channel]= [client]
            channel_Admin[channel] = [client]
        if client in clients_channels:
            clients_channels[client].append(channel)
        else:
            clients_channels[client] = [channel]
        current_chanel[client] = channel

#La liste des clients d'un cannal
def liste_client(adress_client):
    liste = []
    listeAdmin = []
    nick = laddress[connection]
    if nick not in clients_channels:
        gestionMessage(connection, "please choose a channel first \n")
    else :
        channel = current_chanel[nick]
        if nick not in member_in_channels[channel]:
            gestionMessage(connection, "please choose a channel first \n")
        else:
            for x in member_in_channels[channel]:
                liste.append(x)

            for y in channel_Admin[channel]:
                if y in liste:
                    liste.remove(y)
                les_admin = ("@{}@".format(y))
                liste.insert(0,les_admin)
            les_client = (" {} \n".format(liste))
            gestionMessage(adress_client, les_client)

#pour se deconnecter
def sedeconnecter(client):
    client.sendall("good bye amigo \n".encode())
    client.close()
    socketl.remove(client)

#fonction pour quiter un cannal
def quiterchannel(sock_client):
    client = laddress[sock_client]
    if client not in clients_channels:
        gestionMessage(sock_client, "you are not in channel  \n")
    else:
        print(len(clients_channels[client]))
        channel = current_chanel[client]
        
        # if client not in member_in_channels[channel]:
        #     gestionMessage(sock_client, "vous etes pas dans le canal  \n")
        # else:
        longu = len(member_in_channels[channel])
        if client in channel_Admin[channel]:
            channel_Admin[channel].remove(client)

        if longu == 1:
            del member_in_channels[channel]
        else:
            member_in_channels[channel].remove(client)
        if len(clients_channels[client]) > 1:
            canalSecon = clients_channels[client][0]
            current_chanel[client] = canalSecon
            clients_channels[client].remove(channel)
        else:
            print(len(clients_channels[client]))
            del clients_channels[client]
            gestionMessage(sock_client, "choose an other channel ")
            

            

#fonction qui teste si un cannal setrouve dans le dico
def testchane(client,channel):
    for x in member_in_channels:
        if x == channel:
            return True
        else:
            return False

#pour enlever un client dans un cannal
def ejecterclient(sock_nick, client):
    nick = laddress[sock_nick]
    sock_client = getadress(client)
    if nick in clients_channels:
        channel = current_chanel[nick]
        if nick in channel_Admin[channel] :
            if client in member_in_channels[channel] :
                quiterchannel(sock_client)
            else:
                gestionMessage(sock_nick, "sorry he is  not in channel \ n")
        else:
            gestionMessage(sock_nick, "sorry you are not a adminis \n")

#pour renommer un cannal
def rennomChannel(sock_nick, newchannel):
    client = laddress[sock_nick]
    if client not in clients_channels:
        gestionMessage(sock_nick, "sorry you are not in channel  \n")
    else:

        oldchannel = current_chanel[client]
        if client not in channel_Admin[oldchannel]:
            gestionMessage(sock_nick, "sorry you are not a adminis \n")
        else:
    
            if oldchannel in member_in_channels:
                member_in_channels[newchannel] = member_in_channels[oldchannel]
                del member_in_channels[oldchannel]
            if oldchannel in channel_Admin:
                channel_Admin[newchannel] = channel_Admin[oldchannel]
                del channel_Admin[oldchannel]    
            for i in current_chanel:
                current_chanel[i] = newchannel
            for y, z in clients_channels.items():
                if z == oldchannel:
                    clients_channels[y].append(newchannel)
                    clients_channels[y].remove(oldchannel) 

def msgchannel(client,  channe, msgCh):
    if client not in member_in_channels[channe]:
        gestionMessage(connection,stringCA)

    else:
        for l in member_in_channels[channe]:
            x = getadress(l)
            #appelle de la fonction gestionMessage
            gestionMessage(x,msgCh)

def affichercurent(addr):
    nick = laddress[addr]
    if nick in clients_channels:
        curren = current_chanel[client]
        gestionMessage(addr, curren)
    else:
        gestionMessage(addr, "you are not in channel \n")
    
def set_current_channel(sock_client, chan):
    client = laddress[sock_client]
    if client not in member_in_channels[chan]:
        gestionMessage(sock_client,"you are not in channel \n")
    else:
        current_chanel[client] = chan

def rennomerNick(sock_nick, newnick):
    oldnick = laddress[connection]
    liste = []
    for k in clients_channels[oldnick]:
        liste.append(k)
        member_in_channels[k].append(newnick)
        channel_Admin[k].append(newnick)
        member_in_channels[k].remove(oldnick)
        channel_Admin[k].remove(oldnick)

    clients_channels[newnick] = liste
    del clients_channels[oldnick]

    for i,j in laddress.items():
        if j == oldnick:
            laddress[i] = newnick
    current_chanel[newnick] = current_chanel[oldnick]
    del current_chanel[oldnick]

def grantAdmin(sock_nick, client):
    nick = laddress[sock_nick]
    if nick not in clients_channels:
        gestionMessage(connection, "this name do not exist -> /HELP\n")
    else:
        channel = current_chanel[nick]
        if nick not in channel_Admin[channel]:
            gestionMessage(sock_nick, "sorry you are not a adminis \n")
        else:
            if client in member_in_channels[channel] and client not in channel_Admin[channel]:
                channel_Admin[channel].append(client)
            else:
                gestionMessage(sock_nick," this client does not exist in the channel \n")
def revokAdm(sock_nick ,client):
    nick = laddress[sock_nick]
    if nick not in clients_channels:
        gestionMessage(connection, "this name do not exist -> /HELP\n")
    else:
        channel = current_chanel[nick]
        if nick not in channel_Admin[channel]:
            gestionMessage(sock_nick, "sorry you are not a adminis \n")
        else:
            if client in member_in_channels[channel] and client in channel_Admin[channel]:
                channel_Admin[channel].remove(client)
            else:
                gestionMessage(sock_nick, "sorry he is not an admin \n")

def sendfile(sock_client, donnee):
    nick = laddress[sock_client]
    name, fileno = donnee.split(" ",1)
    sock_name = getadress(name)
    if current_chanel[nick] == current_chanel[name]:
        mon_fichier = open(fileno, "r")
        contenu = mon_fichier.read()
        client_contenu[name] = contenu
        msg = "vous aviez un fichier en atente" + fileno
        gestionMessage(sock_name,msg)
        mon_fichier.close()
    else:
        gestionMessage(sock_client, "bous etes pas dans le meme canal")
def recvfile(sock_client, donnee):
    nick = laddress[sock_client]
    if nick in client_contenu:
        fichier = client_contenu[nick]
        print(fichier)
        print(donnee)
        mon_fichier = open(donnee, "w")
        mon_fichier.write(fichier)
        mon_fichier.close()
        del client_contenu[nick]
        gestionMessage(sock_client, "fichier recu avec succes")
    else:
        gestionMessage(sock_client, "vous aviez aucun fichier en attente")


def commandHelp(sock_client):
    msg = """print this message
    * /CURRENT: print current channel name
    * /CURRENT <channel>: set current channel
    * /MSG <nick1;nick2;...> <message>: send a private message to several users in current channel
    * /NICK <nick>: change user nickname on server
    * /GRANT <nick>: grant admin privileges to a user [admin]
    * /REVOKE <nick>: revoke admin privileges [admin]
    * /SEND <nick> </path/to/file>: send a file to a remote user
    * /RECV </path/to/file>: receive a file and save it locally
    * /HISTORY: print history of current channel (saved by server) \n"""
    gestionMessage(sock_client,msg)

def run(sock_client, msgdata):
    
    if msgdata[0] == "/":
        msgclient_decode = msgdata[1:]
        splited = msgclient_decode.split(" ")
        taille = len(msgclient_decode)
        cmd3 = msgclient_decode[:3]
        cmd4 =  msgclient_decode[:4]
        cmd5 = msgclient_decode[:5]
        cmd6 = msgclient_decode[:6]
        cmd7 = msgclient_decode[:7]

        if cmd4 == "LIST":
            nick = laddress[connection]
            listeCannaux(connection, nick)

        if cmd4 == "JOIN":
            string1 = splited[1]
            #appelle de la fonction rejoindre canal
            rejoindreCanal(connection, string1)

        if cmd3 == "WHO":
            #appelle de la fonction list_client
            liste_client(connection)

        if cmd3 == "BYE":
            #appelle de la fonction sedeconnecter
            sedeconnecter(connection)
        elif  cmd5 == "LEAVE":
            #appelle de la fonction quiterchannel
            quiterchannel(connection)

        elif cmd4 == "KICK":
            client_ejec = msgclient_decode[5:-1]
            #appelle de la fonction ejecterclient
            ejecterclient(connection, client_ejec)

        elif cmd3 == "REN":
            channel_reno = splited[1]
            rennomChannel(connection, channel_reno)
        
        elif cmd4 == "HELP":
            commandHelp(connection)

        elif cmd3 == "MSG":
            msg_splited = msgclient_decode.split(" ",2)
            les_recep = msg_splited[1].split(";")
            j = msg_splited[2]
            nick = laddress[connection]
            if len(les_recep) == 0:
                gestionMessage(connection, "please enter at least one recipient of your cannal -> /HELP\n")
            elif len(j) == 0:
                gestionMessage(connection, "please enter a message -> /HELP\n")
            else:
                channel = current_chanel[nick]
                msgcli = nick + " -> "+ j
                for l in les_recep:
                    chann_l = current_chanel[l]
                    if chann_l == channel:
                        x = getadress(l)
                        gestionMessage(x,msgcli)
                    else:
                        gestionMessage(connection, "check your current cannal -> /HELP \n") 
        elif cmd7 == "CURRENT":
            if len(msgclient_decode) > 8:
                channel = msgclient_decode[8:]
                set_current_channel(connection, channel)

            else:
                affichercurent(connection)
        elif cmd4 == "NICK":
            nom = msgclient_decode[5:-1]
            if nom in  clients_channels:
                gestionMessage(connection, "sorry this name already exists \n")
            else:
                rennomerNick(connection, nom)

        elif cmd5 == "GRANT":
            nom = msgclient_decode[6:-1]
            if len(nom) == 0:
                gestionMessage(connection, "this name does not exist-> /HELP\n")
            else:
                grantAdmin(connection, nom)
        elif cmd6 == "REVOKE":
            nom = msgclient_decode[7:-1]
            if len(nom) == 0:
                gestionMessage(connection, "this name does not exist-> /HELP\n")
            else:
                revokAdm(connection, nom)
        elif cmd4 == "SEND":
            a_envoyer = msgclient_decode[5: -1]
            sendfile(connection, a_envoyer)

        elif cmd4 == "RECV":
            a_envoyer = msgclient_decode[5: -1]
            recvfile(connection, a_envoyer)

        

    else:
        client = laddress[connection]
        j = msgdata[0:]
        msgcli = client + " -> "+ j
        if client not in clients_channels:
            gestionMessage(connection, "choose a canal first \n")
        else:
            channel = current_chanel[client]
            msgchannel(client,channel,msgcli)



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
                    run(connection, data)
