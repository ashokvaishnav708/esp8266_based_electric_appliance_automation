/*
 * NodeMCU Pins Connections
 * D0 - 16
 * D1 - 5
 * D2 - 4
 * D5 - 14
 * D6 - 12
 * D7 - 13
 * D8 - 15
 * D9 - 3
 * SD3 - 10
*/
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
 
const char* ssid = "Jionet";
const char* password = "Sakshiji";
const int led = 2;
const int r[9] = {16,5,4,14,12,13,15,3,10};
void setup () {
  delay(10);
  pinMode(led, OUTPUT);
  for(int i=0;i<9;i++)
  {
    pinMode(r[i], OUTPUT);
    digitalWrite(r[i], LOW);
  }
  digitalWrite(led, LOW);
  delay(100); 
  digitalWrite(led, HIGH);
 
}
 
void loop() {
    if (WiFi.status() != WL_CONNECTED)
    {
        WiFi.begin(ssid, password);
        while (WiFi.status() != WL_CONNECTED) {
          delay(100);
          digitalWrite(led, HIGH);
          delay(100);
          digitalWrite(led, LOW);
        }
        digitalWrite(led, HIGH);
    }
    String val,server;
    int i;
    HTTPClient http;
    server = "http://esp.sargatechnology.com/mydevice/ESP3";
    http.begin(server);
    int httpCode = http.GET();
    val = http.getString();
    http.end();
    for(i=1;i<=9;i++)
    {
      String str1 = (String)i+":ON";
      String str2 = (String)i+":OFF";
      if(val.indexOf(str1) >= 0) 
      {
        digitalWrite(r[i-1], HIGH);
        digitalWrite(led, LOW);
        delay(100);
        digitalWrite(led, HIGH);
      }
      else if(val.indexOf(str2) >= 0)
      {
        digitalWrite(r[i-1], LOW);
        digitalWrite(led, LOW);
        delay(100);
        digitalWrite(led, HIGH);
      }
    }
}

