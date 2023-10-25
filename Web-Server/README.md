# Web Server project with NAT

This is a project about a creation of a Web Server using Apache, this site display the current time and date, time zone, server and client IP, latitude, longitude, and it also shows how many requests have been made for this site, providing dynamic information.

![image](https://github.com/JonatasCarrocine/Redes_de_Computadores/assets/39377609/c1525950-a61e-4545-bd55-13a52db14869)
![image](https://github.com/JonatasCarrocine/Redes_de_Computadores/assets/39377609/e6d5f7f4-f140-487e-9dda-6c871e164519)



## Author

 - Jonatas Carrocine

## Installing Apache and PHP

Since I use Windows, I watched this video to configure Apache and PHP: (https://www.youtube.com/watch?v=3EAj9tsXLFU&list=LL&index=1)

- I created my files at directory ``` C:/Apache24/htdocs/mysite ```

- After watching the video, you can access the website at:

```
  127.0.0.1/mysite/
```

## Acessing from another network using Ngrok

We can use Ngrok to access the Web Server from another network. To do that, I watched this video: (https://www.youtube.com/watch?v=aFwrNSfthxU)

### Steps

- Install Ngrok
- Unzip the file and extract to ``` C:\ngrok ```
- Go to Edit the system environment variables -> Environment Variables -> System Variables -> Path -> Edit
- Create a new environment variable, using ``` C:\ngrok ```

- Create an account for Ngrok (https://ngrok.com/), to receive a token
- After obtaining your token, open cmd and add it to your Ngrok configuration:
```
  ngrok config add-authtoken <your-auth-token>
```
#### Start a tunnel

Start a tunnel to your local web server
```
  ngrok http 80
```
In that case, the default port will be 80

After doing that, it will provide a public URL, like ```<string.ngrok-free.app>```, with that URL, you append with ``` /mysite ```, so you can access on your cellphone, like:
```
  https://<string.ngrok-free.app>/mysite/
```
Keep in mind that Ngrok will provide a temporary public URL, so it will change each time you start a tunnel
