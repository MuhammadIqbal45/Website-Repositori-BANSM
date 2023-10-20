<?php

namespace App\Http\Controllers\Admin;

use App\Mail\Notification;
use Illuminate\Support\Facades\Auth;
use App\pengumuman;
use File;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengumumanAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tambahpengumumans = pengumuman::where('id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('email', 'LIKE', '%' . $request->search . '%')
                ->orwhere('subject', 'LIKE', '%' . $request->search . '%')
                ->orwhere('name', 'LIKE', '%' . $request->search . '%')
                ->orwhere('content', 'LIKE', '%' . $request->search . '%')
                ->orwhere('username', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahpengumumans = pengumuman::orderBy('id', 'DESC')->paginate(15);
        }
        return view('admin.pengumuman', compact('tambahpengumumans'));
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
