#include "syscall.h"



void print(char c, int n)
{
    int i;
    #ifdef  CHANGED
        for (i = 0; i < n; i++) {
            PutChar(c + i);
        }
        PutChar('\n');
    #endif //CHANGED
}
int main()
{
    print('a',4);
}