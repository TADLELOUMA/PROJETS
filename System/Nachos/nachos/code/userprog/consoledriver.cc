#ifdef CHANGED

#include "copyright.h"
#include "system.h"
#include "consoledriver.h"
#include "synch.h"


static Semaphore *readAvail;
static Semaphore *writeDone;
static void ReadAvailHandler(void *arg) { (void) arg; readAvail->V(); }
static void WriteDoneHandler(void *arg) { (void) arg; writeDone->V(); }

ConsoleDriver::ConsoleDriver(const char *in, const char *out)
{
    readAvail = new Semaphore("read avail", 0);
    writeDone = new Semaphore("write done", 0);
    console = new Console (in, out, ReadAvailHandler, WriteDoneHandler, NULL);

}

ConsoleDriver::~ConsoleDriver()
{
    
    
    
    delete console;
    delete writeDone;
    delete readAvail;
}
void ConsoleDriver::PutChar(int ch)
{

    // ...
    console->TX (ch);	// echo it!
    writeDone->P ();
    
    
}
int ConsoleDriver::GetChar()
{
    // ...
    int ch;
    readAvail->P ();
    ch = console->RX ();
    return ch;

}

void ConsoleDriver::PutString(const char s[])
{
    // ...
    int taille = strlen(s);
    //printf("%d \n",taille);

    for(int i= 0; i<taille; i++)
    {
        PutChar(s[i]);
        
    }


}
void ConsoleDriver::GetString(char *s, int n)
{
    // ...
    if(s == NULL)
        exit(-1);
    for(int i = 0; i < n; i++)
    {
        s[i] = GetChar();
        if(s[i] == '\n')
            break;
    }

}

#endif // CHANGED