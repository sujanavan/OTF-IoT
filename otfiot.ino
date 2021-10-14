#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "tiruvayipati";  // YOUR WIFI NAME
const char* password = "qqqqqqqq";  // YOUR WIFI PASSWORD

int data=0,d3=0,d4=0,d5=0,d6=0;

void setup () {
  Serial.begin(9600);
  //Define the GPIO for INPUT
  pinMode(D0,INPUT);
  pinMode(D1,INPUT);
  pinMode(D2,INPUT);
  //Define GPIO for OUTPUT
  pinMode(D3,OUTPUT);
  pinMode(D4,OUTPUT);
  pinMode(D5,OUTPUT);
  pinMode(D6,OUTPUT);
  //Connect to Wi-Fi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting WiFi...");
    }
}
 
void loop() {
  int a0 = analogRead(A0);
  int d0 = digitalRead(D0);
  int d1 = digitalRead(D1);
  int d2 = digitalRead(D2);
  //Check for change in temperature before upload to avoid redundant data
  String url="http://otfiot.atwebpages.com/sense.php?data="+String(a0)+","+String(d0)+","+String(d1)+","+String(d2);  
  HTTPClient http;
  http.begin(url);
  int httpCode = http.GET();
  if (httpCode > 0) {
    data = http.getString().toInt();
    d6=data%100;
    data=data/100;
    d5=data%100;
    data=data/100;
    d4=data%100;
    data=data/100;
    d3=data%100;
    data=data/100;
    Serial.println(" Read = " + String(data));
    Serial.println(" D3 = " + String(d3));
    Serial.println(" D4 = " + String(d4));
    Serial.println(" D5 = " + String(d5));
    Serial.println(" D6 = " + String(d6));
    if(d3==30)
    digitalWrite(D3, LOW); 
    if(d3==31)
    digitalWrite(D3, HIGH);
    if(d4==40)
    digitalWrite(D4, LOW); 
    if(d4==41)
    digitalWrite(D4, HIGH);
    if(d5==50)
    digitalWrite(D5, LOW); 
    if(d5==51)
    digitalWrite(D5, HIGH);
    if(d6==60)
    digitalWrite(D6, LOW); 
    if(d6==61)
    digitalWrite(D6, HIGH);
    }
  http.end();
  delay(15000); 
}