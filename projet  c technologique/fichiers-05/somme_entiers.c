/* 
 * somme_entiers.c : 
 * calcul de la somme S des n premiers entiers naturels non nuls.
 * S = 1 + 2 + ... + (n - 1) + n 
 *   = n * (n + 1) / 2
 */ 

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

#define N       100000000
#define GRANUL  10

unsigned long somme_sequentielle(int borne_inf, int borne_sup)
{
  // on calcule la somme sur cette intervalle avec une boucle entre
  // inf et sup
  int i; long somme=0;
  for (i=borne_inf; i<=borne_sup; i++) somme+=i;
  return somme;
}

unsigned long calcul_somme(int borne_inf, int borne_sup)
{
  if (borne_inf+GRANUL >= borne_sup) {
    // si l'intervalle comporte GRANUL entiers ou moins, calculer de
    // maniere sequentielle
    return somme_sequentielle(borne_inf, borne_sup);
  }
  else {
    // sinon on calcule la somme recursivement en divisant l'intervalle
    // par 2
    int mid=(borne_inf+borne_sup)/2;
    return calcul_somme(borne_inf,mid)+calcul_somme(mid+1,borne_sup);
  }
}

void affiche(unsigned long resultat)
{
  printf("La somme des %d premiers entiers est: %ld\n",
	 N, resultat);
}

int main()
{
  unsigned long resultat;
  
  resultat = calcul_somme(1,N);
  affiche(resultat);
	
  return EXIT_SUCCESS;
}
