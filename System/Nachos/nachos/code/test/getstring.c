#ifdef  CHANGED

#include "syscall.h"

char s[25];
int main()
{
    GetString(s,30);
    PutString(s);
    PutString("\n");
}


#endif // CHANGED
