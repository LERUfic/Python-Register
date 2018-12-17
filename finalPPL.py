#!/usr/bin/python

import sys
import csv
import random
import math
import operator

class UserFasor:
    def __init__(self):
        self.indexing = 0
        self.countObj = 0
        self.pk = []
        self.username = []
        self.password = []
        self.nama = []
        self.alamat = []
        self.nid = []
        self.pathNID = []
        self.tglLahir = []
        self.noTelp = []
        self.role = []


    def pushFasor(self,data):
        self.pk.append(data[0])
        self.username.append(data[1])
        self.password.append(data[2])
        self.nama.append(data[3])
        self.alamat.append(data[4])
        self.nid.append(data[5])
        self.pathNID.append(data[6])
        self.tglLahir.append(data[7])
        self.noTelp.append(data[8])
        self.role.append(data[9])

        self.countObj = self.countObj + 1

    def kosongNext(self):
        if(self.indexing < self.countObj):
            return True
        else:
            return False

    def kosongPrev(self):
        if(self.indexing <= 0):
            return False
        else:
            return True

    def iterNext(self):
        self.indexing = self.indexing + 1

    def iterPrev(self):
        self.indexing = self.indexing - 1

    def getData(self):
        arrayData = []
        arrayData.append(self.pk[self.indexing])
        arrayData.append(self.username[self.indexing])
        arrayData.append(self.password[self.indexing])
        arrayData.append(self.nama[self.indexing])
        arrayData.append(self.alamat[self.indexing])
        arrayData.append(self.nid[self.indexing])
        arrayData.append(self.pathNID[self.indexing])
        arrayData.append(self.tglLahir[self.indexing])
        arrayData.append(self.noTelp[self.indexing])
        arrayData.append(self.role[self.indexing])

        return arrayData

    def currPos(self):
        return self.indexing

    def resetPos(self):
        self.indexing = 0

    def jumlahData(self):
        return self.countObj

def loadDB(filename,listUser):
        with open(filename, 'r') as csvfile:
            lines = csv.reader(csvfile)
            dataUser = list(lines)
            for x in range(len(dataUser)):
                listUser.pushFasor(dataUser[x])
            

def findUsername(listUser,userBaru):
    flag = 0
    listUser.resetPos()
    while(listUser.kosongNext()):
        currUser = listUser.getData()
        if(currUser[1] == userBaru[1]):
            flag = 1
        listUser.iterNext()

    if(not flag):
        listUser.pushFasor(userBaru)
        addToDB(userBaru,'fasor.data')
        print("User Telah Berhasil Dibuat")
    else:
        print("User Sudah Ada")

def addToDB(userBaru,filename):
    f = open("fasor.data","a+")
    tulisan = "\n"+userBaru[0]+","+userBaru[1]+","+userBaru[2]+","+userBaru[3]+","+userBaru[4]+","+userBaru[5]+","+userBaru[6]+","+userBaru[7]+","+userBaru[8]+","+userBaru[9]
    f.write(tulisan)

def main(argv):
    listUser = UserFasor()
    loadDB('fasor.data',listUser)
    
    userBaru=[]
    userBaru.append(str(listUser.jumlahData()+1))
    for x in range(len(sys.argv)-1):
        userBaru.append(str(sys.argv[x+1]))
    findUsername(listUser,userBaru)
    
if __name__ == "__main__":
    main(sys.argv[1:])
