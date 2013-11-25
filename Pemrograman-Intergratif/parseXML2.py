#Farrell Yodihartomo 18211033
#Azka Ihsan Nurrahman 18211002
#mesin pencarian menggunakan service xml.etree
#scratching sendiri secara manual, untuk file xml apa saja

import xml.etree.ElementTree as ET
import sys

#format eksekusi program:
#parseXML2.py argv[1] argv[2]
#argv[1] untuk nama file xml
#argv[2] untuk nama tag/tabel yang dicari

file = sys.argv[1] #input dari pengguna untuk nama file
tree = ET.parse(file) #parse dengan elemen tree
root = tree.getroot() #mendapatkan tabel root
elements = sys.argv[2] #input dari pengguna untuk nama tabel
i=0
try:
        for child in root:
                i+=1
                x = child.find(elements).text #simpan setiap elemen yang dicari
                print (elements+" ke "+repr(i)+" : "+x) #interface output
except AttributeError: #error handler
                print ("pencarian gagal")
