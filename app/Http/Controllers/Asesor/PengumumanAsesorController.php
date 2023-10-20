<?php

namespace App\Http\Controllers\Asesor;

use App\Mail\Notification;
use Illuminate\Support\Facades\Auth;
use App\pengumuman;
use File;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengumumanAsesorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tambahpengumumans = pengumuman::where('username', Auth::user()->username)
                ->orWhere('id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('email', 'LIKE', '%' . $request->search . '%')
                ->orwhere('subject', 'LIKE', '%' . $request->search . '%')
                ->orwhere('name', 'LIKE', '%' . $request->search . '%')
                ->orwhere('content', 'LIKE', '%' . $request->search . '%')
                ->orwhere('username', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahpengumumans = pengumuman::orderBy('id', 'DESC')->paginate(15);
        }
        return view('asesor.pengumuman', compact('tambahpengumumans'));
    }

    public function store(Request $request)
    {
        if ($request->attachment) {
            $request->validate([
                'email' => 'required|email',
                'subject' => 'required',
                'name' => 'required',
                'content' => 'required',
                'attachment' => '',
                'username' => Auth::user()->username,
            ]);
            $filename = time() . '_' . $request['attachment']->getClientOriginalName();
            $imagesendbymailwithstore = new pengumuman();
            $imagesendbymailwithstore->name =  $request->name;
            $imagesendbymailwithstore->email = $request->email;
            $imagesendbymailwithstore->subject =  $request->subject;
            $imagesendbymailwithstore->content = $request->content;
            $imagesendbymailwithstore->attachment = $filename;
            $imagesendbymailwithstore->username = Auth::user()->username;
            $imagesendbymailwithstore->save();

            $imagesendbymailwithstore = array(
                'name' => $request->name,
                'email' => $request->email,
                'attachment' =>     $request->attachment,
                'subject' => $request->subject,
                'content' =>     $request->content,
                'username' =>     Auth::user()->username,
            );
            Mail::to($imagesendbymailwithstore['email'])->send(new Notification($imagesendbymailwithstore));
            $request['attachment']->move(public_path() . '/mail', $filename);
        } else {
            $request->validate([
                'email' => 'required|email',
                'subject' => 'required',
                'name' => 'required',
                'content' => 'required',
                'attachment' => '',
                'username' => Auth::user()->username,
            ]);

            $imagesendbymailwithstore = new pengumuman();
            $imagesendbymailwithstore->name =  $request->name;
            $imagesendbymailwithstore->email = $request->email;
            $imagesendbymailwithstore->subject =  $request->subject;
            $imagesendbymailwithstore->content = $request->content;
            $imagesendbymailwithstore->username = Auth::user()->username;
            $imagesendbymailwithstore->save();

            $imagesendbymailwithstore = array(
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'content' =>     $request->content,
                'username' =>     Auth::user()->username,

            );

            Mail::to($imagesendbymailwithstore['email'])->send(new Notification($imagesendbymailwithstore));
        }

        return back()->with('success', 'Data Berhasil Dikirim');

        // if ($request->attachment) {
        //     $request->validate([
        //         'email' => 'required|email',
        //         'subject' => 'required',
        //         'name' => 'required',
        //         'content' => 'required',
        //         'attachment' => '',
        //         'username' => Auth::user()->username,
        //     ]);
        //     $path = public_path('mail');
        //     $attachment = $request->file('attachment');
        //     $name = date('Ymd') . '_' . $attachment->getClientOriginalName();;
        //     if (!File::exists($path)) {
        //         File::makeDirectory($path, $mode = 0777, true, true);
        //     }
        //     $attachment->move($path, $name);

        //     $filename = $path . '/' . $name;

        //     $data = [
        //         'subject' => $request->subject,
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'content' => $request->content,
        //         'username' => Auth::user()->username,
        //         'attachment' => $filename
        //     ];

        //     Mail::send('email-template', $data, function ($message) use ($data) {
        //         $message->to($data['email'])
        //             ->subject($data['subject'])
        //             ->attach($data['attachment']);
        //     });
        // } else {
        //     $request->validate([
        //         'email' => 'required|email',
        //         'subject' => 'required',
        //         'name' => 'required',
        //         'content' => 'required',
        //         'attachment' => '',
        //         'username' => Auth::user()->username,
        //     ]);

        //     $data = [
        //         'subject' => $request->subject,
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'content' => $request->content,
        //         'username' => Auth::user()->username,
        //     ];

        //     Mail::send('email-template', $data, function ($message) use ($data) {
        //         $message->to($data['email'])
        //             ->subject($data['subject']);
        //     });
        // }

        // pengumuman::create($data);
        // return back()->with('success', 'Data Berhasil Dikirim');
    }

    public function destroy($id)
    {
        $hapus = pengumuman::findOrFail($id);

        $file = public_path('mail/') . $hapus->attachment;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
