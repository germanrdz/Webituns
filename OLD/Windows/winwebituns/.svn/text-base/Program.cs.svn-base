using System;
using System.Collections.Generic;
using System.Text;
using iTunesLib;

namespace winwebituns
{
    class Program
    {
        static void Main(string[] args)
        {
            iTunesApp iTunesInstance = new iTunesApp();

            if (args.Length == 0)
            {
                return;
            }

            switch(args[0].ToLower())
            {
                case "next":
                    iTunesInstance.NextTrack(); 
                    
                    break;

                case "prev":
                    iTunesInstance.PreviousTrack(); 
                    
                    break;

                case "play":
                    iTunesInstance.Play();

                    break;

                case "pause":
                    iTunesInstance.Pause(); 

                    break;

                case "current_track_artist":
                    Console.WriteLine(iTunesInstance.CurrentTrack.Artist);
                    
                    break;

                case "current_track_name":
                    Console.WriteLine(iTunesInstance.CurrentTrack.Name);

                    break;

                case "state":
                    Console.WriteLine(iTunesInstance.PlayerState.ToString());

                    break;

                default:
                    break;
            }

        }
    }
}
