# For ZX the values can be PLUS3, ESXDOS, UNO or NEXT.
FILENAME=TopGun2RC6b
./drf zx plus3 $FILENAME.DSF

echo "#####  Make sure PHP is running #########"
read -p "Press enter to continue  - NEXT command : php drb.php "
php drb.php zx plus3 en $FILENAME.json

read -p "Press enter to continue  - NEXT command : daadmaker"
#daadmaker OUTPUT.TAP DS48IE.P3F GAME.DDB GAME.SDG PANTALLA.SRC   --> Creates OUTPUT.TAP with GAME.DDB, GAME.SDG and GAME.SCR
./daadmaker OUTPUT.TAP DS48IE.P3F $FILENAME.DDB
# --> Creates OUTPUT.TAP with GAME.DDB, default font, no graphics and no loading screen.
#daadmaker OUTPUT.TAP DS48IE.P3F GAME.DDB GAME.SCR --> Creates OUTPUT.TAP with GAME.DDB, default font, no graphics and GAME.SCR as loading screen.
#daadmaker OUTPUT.TAP DS48IE.P3F GAME.DDB GAME.SDG GAME.SRC MYLOADER.TAP  --> Creates OUTPUT.TAP with GAME.DDB, GAME.SDG and GAME.SCR, using MYLOADER.TAP as BASIC loader.

/usr/bin/fuse-gtk OUTPUT.TAP

#/MTX
#/0  "\n      .\"'\". \n  .-.| -=- |.-.\n I  I,|oYo|,I II\n II I   '   II I\n I I I +-+ I  II\n II  I'-=-'I I I\n I I I.-:-.I  II\n II  I -:- I I I\n I-I I'==='I  -I\nIIII-I     I-IIII\n"
#/PRO 7
#              MESSAGE "An unknown evil \n" MES 0