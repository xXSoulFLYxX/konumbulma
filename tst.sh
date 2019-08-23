#!/bin/bash
random="Ahmet"$RANDOM"Keskin"
banner(){
clear
echo -e "
\e[31m██████████▓ \e[37mMenu ☾✯\e[31m ▓██████████
▓
▓\e[31m[\e[33m1\e[31m]\e[37mGerçek Zamanlı Konum
▓\e[31m[\e[33m2\e[31m]\e[37mIp Adresi Konum Bilgisi 
▓	  Konum
\e[31m███████████████████████████

\e[37m▒░▓▒░▓▒░Ahmet Keskin
Bu toolun kullanımında meydana gelicek hiç bir şey sorumluluğumda değildir!Kişi yaptığı tüm işlerden kendisi sorumludur!░▒▓░▒▓░▒

\e[31m[\e[33m99\e[31m]\e[33mÇıkış (Exit)

"
read -p $'\e[31m[\e[32m!\e[31m]\e[37mİşlem Numarası : ' islem

}
if [[ -e "Lib/ok.txt" ]]; then
	banner
	if [[ $islem == 01 || $islem == 1 ]]; then
		cd Lib/ && bash tst.sh


	elif [[ $islem == 02 || $islem == 2 ]]; then
			cd Lib2 && bash tst.sh
	elif [[ $islem == 99 ]]; then
			cd .. && bash tst.sh
	else
	clear
	echo -e "\e[31mLütfen işlem numaranızı kontrol ediniz..."				
	sleep 2
	bash tst.sh

	fi

else
	apt install openssh -y 
	apt install openssl -y
	apt install php -y
	cd Lib && echo "" >> ok.txt
	cd ..
	bash tst.sh	
fi
