import requests
from bs4 import BeautifulSoup


resource = requests.get()

def identify_Website():
    '''
    Identifies and returns the website name
    '''
    link = resource.url
    companySite = link.split("/")[2]

    return companySite

