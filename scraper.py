import requests
import csv
from bs4 import BeautifulSoup

websites = ['https://www.pnp.co.za/pnpstorefront/pnp/en/specials-landing',
            'https://www.shoprite.co.za/all-xtra-savings',
            'https://www.woolworths.co.za/cat/Food/Fruit-Vegetables-Salads/_/N-lllnam?No=60&Nrpp=60']



def is_website_online(url):
    '''
    Confirms whether the website is active
    '''
    if requests.get(url).ok:
        identify_website(url)
        return True
    return False

def store_data(site):
    file = open(site+".csv", "w")
    return csv.writer(file)


def identify_website(site):
    '''
    Identifies and returns the website name
    '''
    link = website_resource(site).url
    companySite = link.split("/")[2]
    beautiful_data(site)

    return companySite


def website_resource(website):
    '''Access the website's resources'''
    return requests.get(website)


def beautiful_data(site):
    html_text = BeautifulSoup(website_resource(site).text, 'lxml')
    return html_text

def pnp_scrapper(data, website):
    container = data.find_all("div", class_="item js-product-card-item product-card-grid")
    file = store_data(website.split(".")[1])
    
    for item in container:
        try:
            itemName = item.find('div', class_='item-name').text
            itemCurrentPrice = item.find('div', class_='currentPrice').text.lstrip()
            itemSmartPriceContainer = item.find('div', class_="promotionContainer promotionsShortText")
            smartPrice = itemSmartPriceContainer.a.span.text
            picture = item.find('picture').img['src']

        except:
            continue

def shoprite_scraper(data, website):
    container = data.find_all("div", class_="item js-product-card-item product-card-grid")
    file = store_data(website.split(".")[1])


def woolies_scraper(data, website):
    container = data.find_all("div", class_="item js-product-card-item product-card-grid")
    file = store_data(website.split(".")[1])


for x in range(len(websites)):
    if is_website_online(websites[x]):
        website_url = identify_website(websites[x])
        print(website_url)
        if 'pnp' in website_url:
            pnp_scrapper(beautiful_data(websites[x]), websites[x])
        elif 'shoprite' in website_url:
            shoprite_scraper(beautiful_data(websites[x]), websites[x])
        else:
            woolies_scraper(beautiful_data(websites[x]), websites[x])