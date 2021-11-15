#include <stdio.h>
#include <stdlib.h>
#include <assert.h>


int main (int argc, char * argv[])
{
    int i, total;
    int nb;

    if (argc != 2) {
        printf("Ce programme prend un entier positif ou nul en paramètre \n");
        return EXIT_FAILURE;
    }

    nb = atoi(argv[1]);
    assert (nb >= 0);

    total = 0;

    for (i = nb; i < 10; i++)
      total += i;

    if (total < 0)
      printf("Erreur\n");

    if (total < 45)
        printf ("Echec\n");
    else
        if (total > 45)
            printf ("Encore un Echec\n");
        else
            printf ("Succès\n");

    return 0;
}
