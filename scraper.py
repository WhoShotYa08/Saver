import requests
from bs4 import BeautifulSoup


def is_website_online(url):
    #Confirms whether the website is active
    return requests.get(url).ok


def identify_website():
    '''
    Identifies and returns the website name
    '''
    link = website_resource().url
    companySite = link.split("/")[2]

    return companySite


def website_resource(website):
    '''Access the website's resources'''
    return requests.get(website)

