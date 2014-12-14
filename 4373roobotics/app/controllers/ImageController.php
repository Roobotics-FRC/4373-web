<?php
class ImageController extends BaseController {
	public function upload() {
		$files = Input::file('images');
		// dd($files);
		foreach ($files as $file) {
			$rules = array('file' => 'required|mimes:png,gif,jpeg');
			$validator = Validator::make(array('file'=>$file), $rules);
			if ($validator->passes()) {
				$upload_path = 'images';
				$filename = date('d_m_y_g_i_s_a-') . str_random(7) . '-' . $file->getClientOriginalName();
				$upload_success = $file->move($upload_path, $filename);
				if ($upload_success) {
					$image = new Image();
					$image->description = Input::get('description');
					$image->file_path = $upload_path . '/' . $filename;
					$image->name = $file->getClientOriginalName();
					Sentry::getUser()->images()->save($image);
					return Redirect::to('/user/home');
				}
			}
			else {
				return Redirect::to('/user/home')
					->withInput(Input::except('images'))
					->withErrors($validator);
			}
		}
	}
	public function delete($id) {
		try {
			$user = Sentry::getUser();
			if (Image::find($id)->user->id == $user->id) {
				$image = Image::find($id);
				unlink($image->file_path);
				$image->delete();
			}
			else {
				return "Only admins can delete pictures they don't own ;)";
			}
		}
		catch (Exception $e) {

		}
		return Redirect::to('/user/home');
	}
	public function download($id) {
		try {
			return Response::download(Image::find($id)->file_path);
		}
		catch (Exception $e) {
			return Redirect::to('/');
		}
	}
}