#include <SPI.h>
#include <WiFi.h>
#include <WiFiUdp.h>


int status = WL_IDLE_STATUS;
char ssid[] = "WF"; 
char pass[] = "33333333";    
//int keyIndex = 0;            
char servername[]="192.168.137.131";
unsigned int localPort = 8888;      
WiFiClient client;
char packetBuffer[255];
char  ReplyBuffer[] = "aregrge";       
String readString="";
String reponse;
WiFiUDP Udp;
int photocellPin = A3; 
int photocellReading;

int humidityPin = A2;    
int humidityReading = 0; 

unsigned long delay1 = 1;
unsigned long delay2 = 60000; 
unsigned long delay3 = 65000;
unsigned long t1, t2, t3;


void setup() {
  pinMode(A1, OUTPUT);
  //Initialize serial and wait for port to open:
  Serial.begin(9600);

  t1 = t2 = t3 = millis();

  // check for the presence of the shield:
  if (WiFi.status() == WL_NO_SHIELD) {
    Serial.println("WiFi shield not present");
    
    while (true);
  }

  String fv = WiFi.firmwareVersion();
  if (fv != "1.1.0") {
    Serial.println("Please upgrade the firmware");
  }

 
  while (status != WL_CONNECTED) {
    Serial.print("Attempting to connect to SSID: ");
    Serial.println(ssid);

    status = WiFi.begin(ssid, pass);

    delay(10000);
  }
  Serial.println("Connected to wifi");
  printWifiStatus();
  
  Serial.println("\nStarting connection to server...");
  Udp.begin(localPort);

}

void loop() {    
      if(millis() - t3 > delay3) { 
   
       while (client.available()) {
        char c = client.read();
       // Serial.print(c); 
          if (readString.length() < 187) {
              readString += c; 
            }
           if(readString.length() >186 && reponse.length() <2){
                reponse += c;
            } 
        }
        if(reponse > "12"){
        Serial.println(reponse);
        Serial.print(atoi(reponse.c_str())-11);
             
        }
    client.flush();
    client.stop();
    readString="";
    reponse="";
    t3 = millis();
   }

   if(millis() - t1 > delay1) { 
    int packetSize = Udp.parsePacket();
      if (packetSize) {
          Serial.print("Received packet of size ");
          Serial.println(packetSize);
          Serial.print("From ");
          IPAddress remoteIp = Udp.remoteIP();
          Serial.print(remoteIp);
          Serial.print(", port ");
          Serial.println(Udp.remotePort());
          
          
          int len;
          len=Udp.read(packetBuffer, 255);
          if (len > 0) {
            packetBuffer[len] = 0;
          }
          Serial.println("Contents:");
          Serial.flush();
          if(packetBuffer[0] == '1'){
             digitalWrite(A1, HIGH);
            
          }
          else if(packetBuffer[0] == '2'){
            digitalWrite(A1, LOW);
          }else{
            for(int i=186; i<189; i++){
                  reponse += packetBuffer[i];
              }
              verifLight(reponse);
              Serial.println(reponse);
              Serial.print(atoi(reponse.c_str())-11);
            }
          memset(packetBuffer, 0, 255);
    
         
        /*  Udp.beginPacket(Udp.remoteIP(), Udp.remotePort());
          Udp.write(ReplyBuffer);
          Udp.endPacket();*/
      }
      
    reponse="";
    t1 = millis();
  }
  
  
   if(millis() - t2 > delay2) { 
      if ( status != WL_CONNECTED) { 
          Serial.println("Connexion au wifi impossible");
          status = WiFi.begin(ssid, pass);
          while(true);
          }else {
                if (client.connect(servername, 80) == 1) {
                    postValues();      
                 Serial.println("posted");

                }else{
                    Serial.println("echec post");
            
                }
          }
    t2 = millis();
  }
  
   
 //delay(15000);
   
}

int getLight(){
  photocellReading = analogRead(photocellPin);
  return photocellReading;
  }

  void verifLight(String reponse){
      if(atoi(reponse.c_str())< 22){
             digitalWrite(A1, HIGH);
            
          }
          else {
            digitalWrite(A1, LOW);
          }
    }

int getHumidity(){
  humidityReading = analogRead(humidityPin);
  return humidityReading;
  }

void postValues(){
  char data[64];
    int humidity = getHumidity();
    int light = getLight();
    client.print("GET /Pojet_Iot_Api/php/insertPlante.php?nA=arduino2&nP=geranium&l=");
    client.print(light);
    client.print("&h=");
    client.print(humidity);
    client.print("&i=geranium");
    client.println(" HTTP/1.1");
    client.println("Host: 192.168.137.114");
    client.println("Connection: close");
    client.println();

}

void printWifiStatus() {

  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());

  
  IPAddress ip(192, 168, 137, 114);
  WiFi.config(ip);
  ip= WiFi.localIP();
  Serial.print("IP Address: ");
  Serial.println(ip);

 
  long rssi = WiFi.RSSI();
  Serial.print("signal strength (RSSI):");
  Serial.print(rssi);
  Serial.println(" dBm");
}