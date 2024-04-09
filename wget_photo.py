import subprocess

# URL = "http://www.yung-chi.com/data01/10908%E5%90%91%20({0}).JPG"

# URL = "https://fapello.com/content/-/k/2km-2km-dj-miu-korean/1000/2km-2km-dj-miu-korean_0{0:03d}.jpg"
# URL = "https://fapello.com/content/e/u/eunji-pyoapple/1000/eunji-pyoapple_0{0}.jpg" # 886 - 951
# URL = "https://fapello.com/content/a/u/auddk/1000/auddk_0{0}.jpg"
URL = "https://fapello.com/content/a/u/auddk-77/1000/auddk-77_{0:04d}.jpg" # 247 - 459
URL = "https://fapello.com/content/a/u/auddk/1000/auddk_{0:04d}.jpg" # 313 - 459
# URL = "https://fapello.com/content/-/k/2km-2km-dj-miu-korean/1000/2km-2km-dj-miu-korean_0{0:03d}.jpg" # 391 to 433
URL = "https://i0.wp.com/file.cosblay.com/wp-content/uploads/2023/07/30/3619730163741{0}.webp"

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

for i in range(1, 502):
    cmd = "wget -U 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.1 Safari/605.1.15' "
    runcmd( cmd + URL.format(i), verbose = True)