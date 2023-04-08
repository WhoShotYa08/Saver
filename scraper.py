import requests
from bs4 import BeautifulSoup

websites = ['https://www.pnp.co.za/pnpstorefront/pnp/en/specials-landing',
            'https://www.shoprite.co.za/all-xtra-savings',
            'https://www.woolworths.co.za/cat/Food/Fruit-Vegetables-Salads/_/N-lllnam?No=60&Nrpp=60']

def is_website_online(url):
    '''
    Confirms whether the website is active
    '''
    return requests.get(url).ok


def identify_website(site):
    '''
    Identifies and returns the website name
    '''
    link = website_resource(site).url
    companySite = link.split("/")[2]

    return companySite


def website_resource(website):
    '''Access the website's resources'''
    return requests.get(website)


def beautiful_data(site):
    html_text = BeautifulSoup(website_resource(site).text, 'lxml')


for x in range(len(websites)):
    if is_website_online(websites[x]):
        print(identify_website(websites[x]))