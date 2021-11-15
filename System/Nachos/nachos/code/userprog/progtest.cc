// progtest.cc 
//      Test routines for demonstrating that Nachos can load
//      a user program and execute it.  
//
//      Also, routines for testing the Console hardware device.
//
// Copyright (c) 1992-1993 The Regents of the University of California.
// All rights reserved.  See copyright.h for copyright notice and limitation 
// of liability and disclaimer of warranty provisions.

#include "copyright.h"
#include "system.h"
#include "console.h"
#include "addrspace.h"
#include "synch.h"
#include "consoledriver.h"
//----------------------------------------------------------------------
// StartProcess
//      Run a user program.  Open the executable, load it into
//      memory, and jump to it.
//----------------------------------------------------------------------

void
StartProcess (char *filename)
{
    OpenFile *executable = fileSystem->Open (filename);
    AddrSpace *space;

    if (executable == NULL)
      {
	  SetColor (stdout, ColorRed);
	  SetBold (stdout);
	  printf ("Unable to open file %s\n", filename);
	  ClearColor (stdout);
	  return;
      }
    space = new AddrSpace (executable);
    currentThread->space = space;

    delete executable;		// close file

    space->InitRegisters ();	// set the initial register values
    space->RestoreState ();	// load page table register

    machine->DumpMem ("memory.svg");
    machine->Run ();		// jump to the user progam
    ASSERT (FALSE);		// machine->Run never returns;
    // the address space exits
    // by doing the syscall "exit"
}

// Data structures needed for the console test.  Threads making
// I/O requests wait on a Semaphore to delay until the I/O completes.

static Console *console;
static Semaphore *readAvail;
static Semaphore *writeDone;

//----------------------------------------------------------------------
// ConsoleInterruptHandlers
//      Wake up the thread that requested the I/O.
//----------------------------------------------------------------------

static void
ReadAvailHandler (void *arg)
{
    (void) arg;
    readAvail->V ();
}
static void
WriteDoneHandler (void *arg)
{
    (void) arg;
    writeDone->V ();
}

//----------------------------------------------------------------------
// ConsoleTest
//      Test the console by echoing characters typed at the input onto
//      the output.  Stop when the user types a 'q'.
//----------------------------------------------------------------------

void
ConsoleTest (const char *in, const char *out)
{
    char ch;

    readAvail = new Semaphore ("read avail", 0);
    writeDone = new Semaphore ("write done", 0);
    console = new Console (in, out, ReadAvailHandler, WriteDoneHandler, NULL);

    for (;;)
    {
	  readAvail->P ();	// wait for character to arrive
      console->TX ('<');
      writeDone->P ();
	  ch = console->RX ();
	  console->TX (ch);	// echo it!
      writeDone->P ();
      console->TX ('>');
	  writeDone->P ();	// wait for write to finish
	  if (ch == 'q' || ch == -1) {
	      printf ("Au revoir, bye!\n");
	      break;		// if q, quit
	  }
    }
    delete console;
    delete readAvail;
    delete writeDone;
}


///////////////////////////////////////////////////////////////////////////

#ifdef CHANGED

void
ConsoleDriverTest (const char *in, const char *out)
{
    char ch;
    ConsoleDriver *test_consoledriver = new ConsoleDriver(in, out);
    test_consoledriver->PutString("abcd");
    
    while ((ch = test_consoledriver->GetChar()) != EOF)
    {
        test_consoledriver->PutChar('<');
        test_consoledriver->PutChar(ch);
        test_consoledriver->PutChar('>');

    }

    fprintf(stderr, "EOF detected in ConsoleDriver!\n");

    delete test_consoledriver;
}


int copyStringFromMachine(int from, char *to, unsigned size)
{
    int tmp_char;
    
    for(unsigned i = 0; i < size; i++)
    {
        
        machine->ReadMem(from+i,1,&tmp_char);
        to[i] = tmp_char;
        if(tmp_char == '\0')
        {   
            
            return i;
        }
    }
    to[size] = '\0';
    return size;
}

int copyStringToMachine(char *from, int to, unsigned size)
{
    unsigned i;
    int comp=0;
    for(i = 0; i < size-1; i++)
    {
        
        if(from[i] == '\n')
            break;

        if(from[i] == '\0')
            return comp;
        machine->WriteMem(to+i, 1,from[i]);
        comp++;
    }
    machine->WriteMem(to+comp, 1,'\0');
    return comp;
}

#endif //CHANGED
