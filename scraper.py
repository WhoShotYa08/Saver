import requests
import csv
from bs4 import BeautifulSoup

websites = ['https://www.pnp.co.za/pnpstorefront/pnp/en/specials-landing',
            'https://www.shoprite.co.za/specials?q=%3AspecialsRelevance%3AbrowseAllStoresFacet%3AbrowseAllStoresFacet%3AbrowseAllStoresFacetOff%3AbrowseAllStoresFacetOff&page=1',
            'https://www.woolworths.co.za/cat/Food/Beverages-Juices/_/N-mnxddc']



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
    html_text = BeautifulSoup(website_resource(site).text, 'html.parser')
    return html_text




def pnp_scrapper(data, website):
    container = data.find_all("div", class_="item js-product-card-item product-card-grid")
    file = store_data(website.split(".")[1])
    
    file.writerow(['Name', 'Price', "Discount", "image Link"])
    for item in container:
        try:
            item_name = item.find('div', class_='item-name').text
            current_price = item.find('div', class_='currentPrice').text.lstrip()
            itemSmartPriceContainer = item.find('div', class_="promotionContainer promotionsShortText")
            smart_price = itemSmartPriceContainer.a.span.text
            picture = item.find('picture').img['src']

        except:
            continue

        file.writerow([item_name, current_price, smart_price, picture])



def shoprite_scraper(data, website):
    container = data.find_all("figure", class_="item-product__content")
    file = store_data(website.split(".")[1])

    file.writerow(['Name', 'Price', "Discount", "image Link"])
    for item in container:

        try:
            item_name = item.find("a", class_="product-listening-click")['title']
            before_price = item.find("div", class_="special-price__price").span.text
            smart_price = item.find("span", class_="now").text
            picture = item.find("img", class_="lazyload")['src']

        except:
            continue
        file.writerow([item_name, before_price, smart_price, "https://www.shoprite.co.za"+picture])




def woolies_scraper(data, website):
    container = data.find_all("div", class_="product-list__item")
    file = store_data(website.split(".")[1])

    file.writerow(['Name', 'Price', "Discount"])
    for item in container:

        try:
            item_name = item.find("a", class_="range--title").text
            current_price = item.find("span", class_="font-graphic").strong.text
            smart_price = item.find("div", class_="product__special").text
            price_only = smart_price.split()[4]
        except:
            continue
        
        file.writerow([item_name, price_only, current_price])

def main():
    """
    runs the entire program 
    """

    #iterates over the list of given websites
    for x in range(len(websites)):
        if is_website_online(websites[x]):
            website_url = identify_website(websites[x])
            if 'pnp' in website_url:
                pnp_scrapper(beautiful_data(websites[x]), websites[x])
            elif 'shoprite' in website_url:
                shoprite_scraper(beautiful_data(websites[x]), websites[x])
            else:
                woolies_scraper(beautiful_data(websites[x]), websites[x])


if __name__ == "__main__":
    main()