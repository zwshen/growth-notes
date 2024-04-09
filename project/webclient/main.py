import requests
import base64

def zhBase64Encode(value):
    # Assuming zhBase64Encode is a custom function to encode using a specific encoding
    # You need to implement this function according to your specific encoding requirements
    # Here, we're using the base64 standard library to encode the value
    encoded_bytes = base64.b64encode(value.encode('utf-8'))
    return encoded_bytes.decode('utf-8')

def browse_webpage(url, cookies=None):
    try:
        response = requests.get(url, cookies=cookies)
        # Check if the request was successful (status code 200)
        if response.status_code == 200:
            print("Webpage content:")
            print(response.text)
        else:
            print("Failed to retrieve webpage. Status code:", response.status_code)
    except requests.RequestException as e:
        print("Error occurred:", e)

if __name__ == "__main__":
    url = 'http://122.116.100.40/Pages/main.htm'
    # Optionally, you can include cookies in the request
    cookies = {
        'auInfo': 'YWRtaW46MTIzNDU2',
        'lang_id': '0x0404',
        'lang_type': 'zh-tw',
        # Add more cookies as needed

    }

    browse_webpage(url, cookies)
    # print(zhBase64Encode('admin:123456')) #YWRtaW46MTIzNDU2