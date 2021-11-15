#ifdef   CHANGED

#include "syscall.h"


int c;
int main()
{
    
    c = GetChar();
    PutChar('<');
    PutChar(c);
    PutChar('>');
    

}

#endif // CHANGED
