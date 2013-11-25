#!/usr/bin/python

#Aditya Pradita S. 18211001
#Rakaputra 18211059

#kode diambil dari http://code.activestate.com/recipes/577423-convert-csv-to-xml/

import csv

csvFile = 'Lagu.csv'
#nama file csv yang akan diconvert
xmlFile = 'Lagu.xml'
#nama hasil file yang diconvert

csvData = csv.reader(open(csvFile)) 
#membuka file csv
xmlData = open(xmlFile, 'w')
xmlData.write('<?xml version="1.0"?>' + "\n")
#menulis tag header XML
xmlData.write('<csv_data>' + "\n")
#menulis tag root
rowNum = 0
#inisiasi untuk iterasi baris
for row in csvData:
    if rowNum == 0:
        tags = row
        
        for i in range(len(tags)):
            tags[i] = tags[i].replace(' ', '_')
		#mengganti karakter koma dengan underscore
    else: 
        xmlData.write('<row>' + "\n") 
        for i in range(len(tags)):
            xmlData.write('    ' + '<' + tags[i] + '>' \
                          + row[i] + '</' + tags[i] + '>' + "\n")
        xmlData.write('</row>' + "\n")
            
    rowNum +=1

xmlData.write('</csv_data>' + "\n") #menulis penutup untuk tag root
xmlData.close() #menutup file xml
