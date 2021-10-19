from datetime import datetime
from time import sleep
import os
while True:
    os.system("php /var/www/artisan schedule:run >> /dev/null 2>&1")
    #os.system("echo ran...")
    currenttime = datetime.now()
    seconds = currenttime.second
    tts = 60 - seconds
    sleep(tts)
