URL = "http://www.yung-chi.com/data/1091228%E6%88%B6%E5%A4%96%E5%90%91%E6%97%A5%20({0}).JPG"
URL = "http://www.yung-chi.com/data01/10911%E5%90%91%E6%97%A5%E8%91%B5%E7%B6%B2%E8%B7%AF%20({0}).JPG"
URL = "http://www.yung-chi.com/data01/109%E5%B9%B410%E6%9C%88%E5%90%91%20({0}).JPG"
URL = "http://www.yung-chi.com/data01/10909%E5%90%91%E6%97%A5%E5%B0%8F%E5%B9%BC%20({0}).JPG"
URL = "http://www.yung-chi.com/data01/10908%E5%90%91%20({0}).JPG"
fout = open("/Users/willshen/work/5.txt","w")
for i in range(1, 30):
    data_url = URL.format(i)
    print(data_url)
    fout.write(data_url)
    fout.write("\n")
fout.close()
print('done')