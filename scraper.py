import requests
from bs4 import BeautifulSoup


resource = requests.get()


def is_website_online(url):
    #Confirms whether the website is active
    return requests.get(url).ok


def identify_Website():
    '''
    Identifies and returns the website name
    '''
    link = resource.url
    companySite = link.split("/")[2]

    return companySite



