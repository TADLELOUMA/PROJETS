#ifdef CHANGED

#include "copyright.h"
#include "system.h"
#include "userthread.h"
#include "syscall.h"
#include "addrspace.h"
#include "synch.h"
#include "thread.h"

static void StartUserThread(void *schmurtz)
{
    /*int i;
    for (i = 0; i < NumTotalRegs; i++)
	machine->WriteRegister (i, 0); 

    /*machine->run();
    ASSERT (FALSE);*/

}


int do_ThreadCreate(int f, int arg)
{
    /*Thread *newThread;
    
    newThread = new Thread(f,arg);
    newThread->Start(StartUserThread, schmurtz)

    */

    return 0;
}



void ThreadExit()
{


}

#endif  //CHANGED