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
lisää tiedoston loppuun (vaihda kansio-polku sinne, missä tiedosto sijaitsee)
```
*/40 * * * * python3 /home/user/send.py
```