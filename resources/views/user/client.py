import socket
import os

realpit = []
shadowpit = []
depth = []

def changeplayer():
	if player == 1:
		player = 2
	elif:
		player = 1

def choose(x, player, pit = []):
	if pit[x] or x==13 or x=6:
		pass
	else:
		hold = pit[x]
		now = x
		pit[x] = 0
		while 1:
			now += 1
			now = now%14
			if player == 1 and now==13:
				pass
			elif player == 2 and now == 6:
				pass
			elif pit[now]==0 or now==player*7-1:
				if hold==1:
					if now == player*7-1:
						pit[now] = pit[now]+1
					else:
						if player==1 and now<6:
							pit[player*7-1]+=pit[((player*7-1)+((player*7-1)-now))%14]
							pit[((player*7-1)+((player*7-1)-now))%14]=0
						elif player==2 and now>6:
							pit[player*7-1]+=pit[((player*7-1)+((player*7-1)-now))%14]
							pit[((player*7-1)+((player*7-1)-now))%14]=0
						pit[now]=pit[now]+1;
						changeplayer();
					hold -= 1
					break
			elif hold==1 and pit[now]!=0:
				hold+=pit[now]
				pit[now]=0
			else:
				pit[now]+=1
				hold--
			print "  "
			for i in range(5,0):
				print pit[i] + " "
			print pit[6] + "               " + pit[13]
			print "  "
			for j in range(7,12):
				print pit[j] + " "
			print "hold = " + hold
			print "Player"+player+"'s' turn"
			sleep(1)
			os.system('cls')

def test (x, player, pit = []):
	if pit[x] or x==13 or x=6:
		pass
	else:
		hold = pit[x]
		now = x
		pit[x] = 0
		while 1:
			now += 1
			now = now%14
			if player == 1 and now==13:
				pass
			elif player == 2 and now == 6:
				pass
			elif pit[now]==0 or now==player*7-1:
				if hold==1:
					if now == player*7-1:
						pit[now] = pit[now]+1
					else:
						if player==1 and now<6:
							pit[player*7-1]+=pit[((player*7-1)+((player*7-1)-now))%14]
							pit[((player*7-1)+((player*7-1)-now))%14]=0
						elif player==2 and now>6:
							pit[player*7-1]+=pit[((player*7-1)+((player*7-1)-now))%14]
							pit[((player*7-1)+((player*7-1)-now))%14]=0
						pit[now]=pit[now]+1;
						changeplayer();
					hold -= 1
					break
			elif hold==1 and pit[now]!=0:
				hold+=pit[now];
				pit[now]=0;
			else:
				pit[now]+=1;
				hold--

if __name__ == "__main__":
	player = 1
	for i in range(0,13):
		if i==6 || i==13:
			realpit[i] = 0
		else:
			realpit[i] =3
	print "  "
	for j in range(5,0):
		print realpit[j] + " "
	print realpit[6] + "               " + realpit[13]
	print "  "
	for k in range(7,12):
		print realpit[k] + " "

	while 1:
		play1 = 0
		play2 = 0
		print "Player"+player
		if player == 1:
			print "Pilih Player 1 : "
			pilih = raw_input()
			while  pilih > 5:
				print "Pilih Player 1 : "
				pilih = raw_input()
		else:
			print "Pilih Player 1 : "
			pilih = raw_input()
			while  pilih > 5:
				print "Pilih Player 1 : "
				pilih = raw_input()
		sleep(1)
		os.system(cls)

		if realpit[pilih] == 0:
			changeplayer()
		else:
			choose(pilih, player, realpit)
		print "  "
		for y in range(5,0):
			print realpit[y] + " "
			if realpit[y] == 0:
				play1+=1
		print realpit[6] + "               " + realpit[13]
		print "  "
		for z in range(7,13):
			print realpit[z] + " "
			if realpit[z] == 0:
				play2+=1

		if play1 == 6 and play2 == 6:
			if realpit[6] < realpit[13]:
				print "Player 2 MENANG"
			elif realpit[6] < realpit[13]:
				print "Player 1 MENANG"
