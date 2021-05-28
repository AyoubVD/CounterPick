def findUser(region,username):
  from selenium import webdriver
  from selenium.webdriver.common.keys import Keys
  from selenium.webdriver.common.by import By
  from selenium.webdriver.support.ui import WebDriverWait
  from selenium.webdriver.support import expected_conditions 

  jonagold = region.upper()
  gay = username
  PATH = "chromedriver.exe"
  driver = webdriver.Chrome(PATH)
  url = "https://lolprofile.net/summoner/"+jonagold+"/"+gay
  driver.get(url)
  pensioen = ""

  #Locating the search results
  try:
    search_results = WebDriverWait(driver, 2).until(
    expected_conditions.presence_of_element_located((By.CLASS_NAME, "s-h"))
    ) 
    print(search_results)
    #Scraping the posts’ headings
    posts = search_results.find_elements_by_css_selector("div.m-c")
    for post in posts:
      header = post.find_element_by_tag_name("h1")
      pensioen = header.text
    driver.quit()
    if(pensioen==gay):
      return True
  except:
    return False
    driver.quit()
  

bestaatgebruiker = findUser('euw','jinchuuriki007')
print(bestaatgebruiker)