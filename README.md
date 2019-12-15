# IoT-järjestelmän toteutus

1. laita send.py:hyn omat tiedot ja macit
2. aja koodi raspilla
```
$ python3 send.py
```
3. jos haluat että päivittää itsekseen tietokantaan, lisää ajo crontabiin:
```
$ crontab -e
```
lisää tiedoston loppuun
```
*/40 * * * * python3 /home/user/send.py
```