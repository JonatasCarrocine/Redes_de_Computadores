# Web Server project with NAT

This is a project about a creation of a Web Server using Apache, this site display the current time and date, time zone, server and client IP, latitude, longitude, and it also shows how many requests have been made for this site, providing dynamic information.

![image](https://github.com/JonatasCarrocine/Redes_de_Computadores/assets/39377609/c1525950-a61e-4545-bd55-13a52db14869)
![image](https://github.com/JonatasCarrocine/Redes_de_Computadores/assets/39377609/e6d5f7f4-f140-487e-9dda-6c871e164519)



## Author

 - Jonatas Carrocine

## Getting Started

1. Open two CMD and compile the server class in one terminal and the client class on another terminal
```
  javac Client.java
  javac Server.java
```

2. Start the server
```
  java Server
```

3. Start the client
```
  java Client
```
4. After that, you can access the website at:
```
  127.0.0.1/mysite/
```

5. Acessing from another network using Ngrok

We can use Ngrok to access the Web Server from another network.

- Install Ngrok

- Start a tunnel
```
  ngrok http 80
```
After doing that, it will provide a public URL, with that URL, you append with ``` /mysite ```, so you can access on your cellphone
