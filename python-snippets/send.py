from ruuvitag_sensor.ruuvi import RuuviTagSensor, RunFlag
from datetime import datetime
import requests

counter = 1
run_flag = RunFlag()

def handledata(found_data):

    mac = found_data[0]

 #   mulla on kaks ruuvitagia niin ne tulee sit erikseen
 #
 #   if found_data[0] is '00:00:00:00:00:00':
 #       mac = 1
 #   elif found_data[0] is '11:11:11:11:11:11':
 #       mac = 2

    data = found_data[1]

  #  temp = data['temperature']

    url = "http://51.83.73.200/iot/sensordata.php"
    info = { 'user':'oma_käyttis', 'pass':'oma_salasana', 'deviceid':mac, 'temperature': data['temperature'], 'humidity': data['humidity'], 'pressure': data['pressure'] }
#    r  = requests.post(url=url, data=info)

    print(info)
 #   print(r.text)

    global counter
    counter = counter - 1
    if counter <= 0:
        run_flag.running = False

mac = '22:22:22:22:22:22' #tähän oma ruuvitag mac-osoite

#macs = ['11:11:11:11:11:11','00:00:00:00:00:00']
RuuviTagSensor.get_datas(handledata, macs, run_flag)
