import subprocess

# URL = "http://www.yung-chi.com/data/1091228%E6%88%B6%E5%A4%96%E5%90%91%E6%97%A5%20({0}).JPG"
# URL = "http://www.yung-chi.com/data01/10911%E5%90%91%E6%97%A5%E8%91%B5%E7%B6%B2%E8%B7%AF%20({0}).JPG"
# URL = "http://www.yung-chi.com/data01/109%E5%B9%B410%E6%9C%88%E5%90%91%20({0}).JPG"
# URL = "http://www.yung-chi.com/data01/10909%E5%90%91%E6%97%A5%E5%B0%8F%E5%B9%BC%20({0}).JPG"
URL = "http://www.yung-chi.com/data01/10908%E5%90%91%20({0}).JPG"

URL = "https://fapello.com/content/-/k/2km-2km-dj-miu-korean/1000/2km-2km-dj-miu-korean_0{0:03d}.jpg"
# URL = "https://fapello.com/content/e/u/eunji-pyoapple/1000/eunji-pyoapple_0{0}.jpg" # 742 - 785
# URL = "https://fapello.com/content/a/u/auddk/1000/auddk_0{0}.jpg"
URL = "https://fapello.com/content/a/u/auddk-77/1000/auddk-77_{0:04d}.jpg" # 1 - 247
# URL = "https://fapello.com/content/-/k/2km-2km-dj-miu-korean/1000/2km-2km-dj-miu-korean_0{0:03d}.jpg" # 391 to 433

def runcmd(cmd, verbose = False, *args, **kwargs):
    process = subprocess.Popen(
        cmd,
        stdout = subprocess.PIPE,
        stderr = subprocess.PIPE,
        text = True,
        shell = True
    )
    std_out, std_err = process.communicate()
    if verbose:
        print(std_out.strip(), std_err)

# for i in range(743, 786):
for i in range(1, 248):
    cmd = "wget "
    runcmd( cmd + URL.format(i), verbose = True)