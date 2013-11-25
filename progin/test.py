#Danang Arbansa Nur 18211040
#Yogi Agnia Dwi Saputro 18211016

import xml.etree.ElementTree as ET
import sys

file = sys.argv[1]
tree = ET.parse(file)
root = tree.getroot()
data = sys.argv[2]

for country in root.findall('country'):
	a = country.find('nama').txt
	b = country.find(data).txt
	print('Negara :'+a+', Data : '+b)
