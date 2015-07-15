<?php
switch ( $textpart ) {
//browsesources.php, showsource.php
case "sources":
$text['browseallsources']="Duyệt tất cả các nguồn";
$text['shorttitle']="Tiêu đề ngắn";
$text['callnum']="Gọi số";
$text['author']="Tác giả";
$text['publisher']="Nhà xuất bản";
$text['other']="Thông tin khác";
$text['sourceid']="ID Nguồn";
$text['moresrc']="Nguồn";
$text['repoid']="ID Kho ";
$text['browseallrepos']="Duyệt tất cả các kho";
break; 
 
//changelanguage.php, savelanguage.php 
case "language": 
$text['newlanguage']="Ngôn ngữ mới";
$text['changelanguage']="Thay đổi ngôn ngữ";
$text['languagesaved']="Ngôn ngữ đã lưu";
$text['sitemaint']="Bảo trì site";
$text['standby']="Các trang web tạm thời không có trong khi chúng tôi cập nhật cơ sở dữ liệu của chúng tôi Vui lòng thử lại trong một vài phút. Nếu trang web vẫn còn xuống trong một thời gian dài của thời gian, xin vui lòng <a href=\";suggest.php\";> liên hệ với chủ sở hữu trang web < / a> ";
break; 
 
//gedcom.php, gedform.php 
case "gedcom": 
$text['gedstart']="GEDCOM bắt đầu từ";
$text['producegedfrom']="Sản xuất một tập tin GEDCOM từ";
$text['numgens']="Tổng số thế hệ";
$text['includelds']="Bao gồm LDS thông tin";
$text['buildged']="Xây dựng GEDCOM";
$text['gedstartfrom']="GEDCOM bắt đầu từ";
$text['nomaxgen']="Bạn phải cho biết một số lượng tối đa của các thế hệ Xin vui lòng sử dụng nút Back để trở lại trang trước đó và sửa lỗi.";
$text['gedcreatedfrom']="GEDCOM tạo ra từ";
$text['gedcreatedfor']="Tạo ra cho";
$text['enteremail']="Xin vui lòng nhập một địa chỉ e-mail hợp lệ";
$text['creategedfor']="Tạo GEDCOM";
$text['email']="E-mail";
$text['suggestchange']="Đề nghị thay đổi";
$text['yourname']="Tên của bạn";
$text['comments']="Mô tả về <br /> thay đổi được đề xuất";
$text['comments2']="Ý kiến";
$text['submitsugg']="Gửi Ý Kiến";
$text['proposed']="Đề xuất thay đổi";
$text['mailsent']="Cảm ơn thông điệp của bạn đã được gửi đi.";
$text['mailnotsent']="Chúng tôi xin lỗi, nhưng thông điệp của bạn không thể được gửi Xin vui lòng liên hệ với xxx trực tiếp qua yyy";
$text['mailme']="Gửi một bản sao đến địa chỉ này";
$text['entername']="Xin vui lòng nhập tên của bạn";
$text['entercomments']="Xin vui lòng nhập bình luận của bạn";
$text['sendmsg']="Gửi tin nhắn";
//added in 9.0.0 
$text['subject']="Chủ đề";
break; 
 
//getextras.php, getperson.php 
case "getperson": 
$text['photoshistoriesfor']="Hình ảnh và lịch sử cho";
$text['indinfofor']="Thông tin cá nhân";
$text['pp']="Trang"; // trang viết tắt
$text['age']="Tuổi";
$text['agency']="Cơ quan";
$text['cause']="Nguyên nhân";
$text['suggested']="Đề nghị";
$text['closewindow']="Đóng cửa sổ này";
$text['thanks']="Cảm ơn";
$text['received']="Gợi ý của bạn đã được chuyển tiếp đến người quản trị trang web để xem xét.";
$text['indreport']="Cá nhân Báo cáo";
$text['indreportfor']="Cá nhân Báo cáo cho";
$text['general']="Tổng quát";
$text['bkmkvis']="<strong> Lưu ý: </ strong> Những trang đánh dấu chỉ hiển thị trên máy tính này và trong trình duyệt này.";
        //added in 9.0.0 
$text['reviewmsg']="Bạn có một đề nghị thay đổi cần nhận xét của bạn quan ngại về hỏi này:";
        $text['revsubject']="Đề xuất thay đổi cần nhận xét của bạn";
        break; 
 
//relateform.php, relationship.php, findpersonform.php, findperson.php 
case "relate": 
$text['relcalc']="Tính toán mối quan hệ";
$text['findrel']="Tìm quan hệ";
$text['person1']="Thành viên 1:";
$text['person2']="Thành viên 2:";
$text['calculate']="Tính toán";
$text['select2inds']="Hãy chọn hai thành viên";
$text['findpersonid']="Tìm ID thành viên";
$text['enternamepart']="Nhập một phần của tên đầu tiên hoặc cuối cùng";
$text['pleasenamepart']="Xin vui lòng nhập một phần của một tên đầu tiên hoặc cuối cùng.";
$text['clicktoselect']="Nhấp vào để chọn";
$text['nobirthinfo']="Không có thông tin ngày sinh";
$text['relateto']="Mối quan hệ";
$text['sameperson']="Hai thành viên là cùng một người.";
$text['notrelated']="Hai thành viên không có liên hệ trong vòng xxx đời. "; // Xxx / sẽ được thay thế bằng số của các thế hệ
$text['findrelinstr']="Để hiển thị các mối quan hệ giữa hai thành viên, sử dụng 'Tìm' nút dưới đây để xác định vị trí của thành viên (hoặc giữ cho những thành viên được hiển thị), sau đó nhấp vào 'Tính toán'.";
$text['sometimes']="(Đôi khi kiểm tra trên một số lượng khác nhau của các thế hệ mang lại một kết quả khác nhau.) ";
$text['findanother']="Tìm một mối quan hệ";
$text['brother']="Anh trai của";
$text['sister']="Em gái của";
$text['sibling']="Anh, chị, em ruột của";
$text['uncle']="Chú xxx đời";
$text['aunt']="Dì xxx đời";
$text['uncleaunt']="Chú xxx đời/ dì";
$text['nephew']="Là cháu trai xxx đời";
$text['niece']="Cháu gái xxx đời";
$text['nephnc']="Là cháu trai xxx đời/ cháu gái của";
$text['removed']="Lần gỡ bỏ";
$text['rhusband']="Chồng";
$text['rwife']="Vợ";
$text['rspouse']="Người";
$text['son']="Con trai của";
$text['daughter']="Con gái của";
$text['rchild']="Con của";
$text['sil']="Con rể";
$text['dil']="Con dâu";
$text['sdil']="Con rể và dâu";
$text['gson']="Cháu trai xxx đời";
$text['gdau']="Cháu gái xxx đời";
$text['gsondau']="Cháu xxx đời";
$text['great']="Cụ tổ";
$text['spouses']="vợ chồng";
$text['is']="Là";
$text['changeto']="Thay đổi (nhập ID):";
$text['notvalid']="Không phải là một người số ID hợp lệ hoặc không tồn tại trong cơ sở dữ liệu này Vui lòng thử lại.";
$text['halfbrother'] = "anh em cùng cha khác mẹ (cùng mẹ khác cha)";
$text['halfsister'] = "chị em cùng cha khác mẹ (cùng mẹ khác cha)";
$text['halfsibling'] = "anh chị em cùng cha khác mẹ (cùng mẹ khác cha)";
//changed in 8.0.0
$text['gencheck'] = "Số thế hệ nhiều nhất để kiểm tra";
$text['mcousin']="Người anh em họ xxx yyy của người anh em họ nam"; // xxx=số người anh em họ, yyy=lần loại bỏ
$text['fcousin']="Người anh em họ xxx yyy"; // ​​nữ người anh em họ
$text['cousin']="Người anh em họ xxx yyy";
$text['mhalfcousin']="Xxx yyy nửa người anh em họ của"; // nam anh em họ
$text['fhalfcousin']="Nửa xxx anh em họ yyy"; // ​​nữ người anh em họ
$text['halfcousin']="Nửa xxx anh em họ yyy";
//added in 8.0.0 
$text['oneremoved']="Một lần gỡ bỏ";
$text['gfath']="Cụ nội xxx đời";
$text['gmoth']="Cụ ngoại xxx đời";
$text['gpar']="Cụ xxx đời";
$text['mothof']="Mẹ của";
$text['fathof']="Cha của";
$text['parof']="Cha mẹ của";
$text['maxrels']="Tối đa các mối quan hệ để hiển thị";
$text['dospouses']="Hiển thị các mối quan hệ liên quan đến vợ (chồng)";
$text['rels']="Mối quan hệ";
$text['dospouses2']="Vợ chồng Hiển thị";
$text['fil']="Cha đẻ trong pháp luật";
$text['mil']=", Người mẹ trong pháp luật";
$text['fmil']="Cha đẻ hoặc mẹ chồng";
$text['stepson']="Con trai riêng của";
$text['stepdau']="Con gái riêng của";
$text['stepchild']="Con riêng của";
$text['stepgson']="cháu trai kế xxx đời của";
$text['stepgdau']="cháu gái kế xxx đời của";
$text['stepgchild']="cháu";
//added in 8.1.1 
$text['ggreat']="cụ cố";
//added in 8.1.2 
$text['ggfath']="cụ cố nội xxx đời của";
$text['ggmoth']="cụ cố ngoại xxx đời của";
$text['ggpar']="cụ cố xxx đời của";
$text['ggson']="cháu trai xxx đời của ông bà";
$text['ggdau']="cháu gái xxx đời của ông bà";
$text['ggsondau']="cháu xxx đời của ông bà";
$text['gstepgson']="cháu trai riêng xxx đờicủa";
$text['gstepgdau']="cháu gái riêng xxx đờicủa";
$text['gstepgchild']="cháu riêng xxx đờicủa";
$text['guncle']="ông bác xxx đời của";
$text['gaunt']="bà cô xxx đời của";
$text['guncleaunt']="ông bác, bà cô xxx đời của";
$text['gnephew']="cháu trai xxx đời của";
$text['gniece']="cháu gái xxx đời của";
$text['gnephnc']="cháu xxx đời của";
break; 
 
case "familygroup": 
$text['familygroupfor']="Nhóm gia đình";
$text['ldsords']="Pháp lệnh LDS";
$text['baptizedlds']="Rửa tội";
$text['endowedlds']="Ưu đãi";
$text['sealedplds']="Sealed Parents";
$text['sealedslds']="Sealed để vợ, chồng";
$text['otherspouse']="Khác vợ, chồng";
$text['husband']="Chồng";
$text['wife']="Vợ";
break; 
 
//pedigree.php 
case "pedigree": 
$text['capbirthabbr']="B";
$text['capaltbirthabbr']="A";
$text['capdeathabbr']="D";
$text['capburialabbr']="B";
$text['capplaceabbr']="P";
$text['capmarrabbr']="M";
$text['capspouseabbr']="SP";
$text['redraw']="Chuyển";
$text['scrollnote']="Ghi chú: Bạn có thể phải di chuyển xuống hoặc sang phải để xem biểu đồ.";
$text['unknownlit']="Không biết";
$text['popupnote1']="Thông tin thêm";
$text['popupnote2']="Phả hệ";
$text['pedcompact']="Thu gọn";
$text['pedstandard']="Chuẩn";
$text['pedtextonly']="Văn bản";
$text['descendfor']="Con cháu của";
$text['maxof']="Tối đa";
$text['gensatonce']="Thế hệ hiển thị cùng một lúc.";
$text['sonof']="Con trai";
$text['daughterof']="Con gái";
$text['childof']="Con của";
$text['stdformat']="Định dạng chuẩn";
$text['ahnentafel']="Ahnentafel";
$text['addnewfam']="Thêm gia đình mới";
$text['editfam']="Chỉnh sửa gia đinh";
$text['side']="Phía";
$text['familyof']="Gia đình";
$text['paternal']="Cha";
$text['maternal']="Bà mẹ";
$text['gen1']="Tự";
$text['gen2']="Cha mẹ";
$text['gen3']="Ông bà";
$text['gen4']="Cụ";
$text['gen5']="Cụ tổ 2 đời";
$text['gen6']="Cụ tổ 3 đời";
$text['gen7']="Cụ tổ 4 đời";
$text['gen8']="Cụ tổ 5 đời";
$text['gen9']="Cụ tổ 6 đời";
$text['gen10']="Cụ tổ 7 đời";
$text['gen11']="Cụ tổ 8 đời";
$text['gen12']="Cụ tổ 9 đời";
$text['graphdesc']="Biểu đô con cháu đến thời điểm này";
$text['pedbox']="Box";
$text['regformat']="Khuôn mẫu";
$text['extrasexpl']="= Ít nhất một hình ảnh, lịch sử hoặc mục phương tiện truyền thông khác tồn tại cho người này.";
$text['popupnote3']="Biểu đồ";
$text['mediaavail']="Media có sẵn";
$text['pedigreefor']="Biểu đồ phả hệ của";
$text['pedigreech']="Biểu đồ phả hệ";
$text['datesloc']="Ngày và địa điểm";
$text['borchr']="Năm sinh - Năm mất";
$text['nobd']="Không có ngày sinh, mất";
$text['bcdb']="Dữ liệu tất cả ngày sinh ngày mất";
$text['numsys']="Đánh số";
$text['gennums']="Chỉ số thế hệ";
$text['henrynums']="Số Henry";
$text['abovnums']="Số D'Aboville";
$text['devnums']="Số De Villiers";
$text['dispopts']="Tùy chọn hiển thị";
break; 
 
//search.php, searchform.php 
//merged with reports and showreport in 5.0.0 
case "search": 
case "reports": 
$text['noreports']="Không có báo cáo tồn tại.";
$text['reportname']="Báo cáo Name";
$text['allreports']="Tất cả các báo cáo";
$text['report']="Báo cáo";
$text['error']="Lỗi";
$text['reportsyntax']="Cú pháp của câu truy vấn chạy với báo cáo này";
$text['wasincorrect']="Là không chính xác, và kết quả là báo cáo không thể được chạy Xin vui lòng liên hệ với quản trị hệ thống.";
$text['query']="Truy vấn";
$text['errormessage']="Thông báo lỗi";
$text['equals']="Bằng";
$text['endswith']="Kết thúc với";
$text['soundexof']="Soundex of";
$text['metaphoneof']="Metaphone of";
$text['plusminus10']="+ / - 10 năm kể từ";
$text['lessthan']="Ít hơn";
$text['greaterthan']="Lớn hơn";
$text['lessthanequal']="Ít hơn hoặc bằng";
$text['greaterthanequal']="Lớn hơn hoặc bằng";
$text['equalto']="Bằng";
$text['tryagain']="Vui lòng thử lại";
$text['text_for']="Cho";
$text['joinwith']="Liên kết điều kiện";
$text['cap_and']="Và";
$text['cap_or']="Hoặc";
$text['showspouse']="Hiển thị vợ (chồng) (sẽ hiển thị bản sao nếu cá nhân có nhiều hơn một vợ (chồng))";
$text['submitquery']="Thực hiện truy vấn";
$text['birthplace']="Nơi sinh";
$text['deathplace']="Nơi mất";
$text['birthdatetr']="Năm sinh";
$text['deathdatetr']="Mất năm";
$text['plusminus2']="+ / - 2 năm kể từ";
$text['resetall']="Thiết lập lại tất cả các giá trị";
$text['showdeath']="Hiển thị thông tin về ngày mất, nơi mai táng";
$text['altbirthplace']="Nơi rửa tội";
$text['altbirthdatetr']="Thời gian rửa tội";
$text['burialplace']="Nơi mai táng";
$text['burialdatetr']="Năm mai táng";
$text['event']="Sự kiện";
$text['day']="Day";
$text['month']="Tháng";
$text['keyword']="Từ khoá (ví dụ, \"; Abt \";)";
$text['explain']="Nhập các thành phần ngày để xem các sự kiện phù hợp với một trống trường này để xem trận đấu cho tất cả.";
$text['enterdate']="Xin vui lòng nhập hoặc chọn ít nhất một trong những điều sau đây: ngày, tháng, năm, từ khoá";
$text['fullname']="Tên đầy đủ";
$text['birthdate']="Ngày sinh";
$text['altbirthdate']="Thời gian rửa tội";
$text['marrdate']="Hôn nhân ngày";
$text['spouseid']="ID Vợ, Chồng";
$text['spousename']="Tên vợ, Chồng";
$text['deathdate']="Mất ngày";
$text['burialdate']="Ngày mai táng";
$text['changedate']="Sửa đổi lần cuối ngày";
$text['gedcom']="Cây";
$text['baptdate']="Bí tích Rửa tội ngày (LDS)";
$text['baptplace']="Bí Tích Rửa Tội Place (LDS)";
$text['endldate']="Quỹ ngày (LDS)";
$text['endlplace']="Endowment Place (LDS)";
$text['ssealdate']="Seal ngày S (LDS)"; 
$text['ssealplace']="Seal Place S (LDS)";
$text['psealdate']="Seal ngày P (LDS)"; 
$text['psealplace']="Seal Place P (LDS)";
$text['marrplace']="Nơi kết hôn";
$text['spousesurname']="Tên của vợ (chồng)";
$text['spousemore']="Nếu bạn nhập một giá trị cho tên của vợ (chồng), bạn phải chọn một Giới Tính.";
$text['plusminus5']="+ / - 5 năm kể từ";
$text['exists']="Tồn tại";
$text['dnexist']="Không tồn tại";
$text['divdate']="Ly dị ngày";
$text['divplace']="Nơi ly dị";
$text['otherevents']="Tìm kiếm tiêu chuẩn";
$text['numresults']="Kết quả trên mỗi trang";
$text['mysphoto']="Mystery hình ảnh";
$text['mysperson']="Elusive nhân dân";
$text['joinor']="'Tham gia với hoặc' tùy chọn không được sử dụng tên của vợ (chồng)";
$text['tellus']="Hãy cho chúng tôi biết những gì bạn biết";
$text['moreinfo']="Thông tin thêm:";
//added in 8.0.0 
$text['marrdatetr']="Kết hôn năm";
$text['divdatetr']="Ly dị năm";
$text['mothername']="Tên Mẹ";
$text['fathername']="Tên Cha";
$text['filter']="Filter";
$text['more']="More";
$text['notliving']="Sống";
$text['nodayevents']="Sự kiện tháng này không liên quan đến một ngày cụ thể:";
//added in 9.0.0 
$text['csv']="CSV phân cách tập tin bằng dấu phẩy";
break; 
 
//showlog.php 
case "showlog": 
$text['logfilefor']="Đăng nhập tập tin cho";
$text['mostrecentactions']="hành động gần đây nhất";
$text['autorefresh']="Tự động làm mới (30 giây)";
$text['refreshoff']="Tắt tự động làm mới";
break; 
 
case "headstones": 
case "showphoto": 
$text['cemeteriesheadstones']="nghĩa trang và bia mộ";
$text['showallhsr']="Hiển thị tất cả các hồ sơ bia mộ";
$text['in']="Trong";
$text['showmap']="Hiển thị bản đồ";
$text['headstonefor']="Bia mộ cho";
$text['photoof']="Ảnh";
$text['firstpage']="Trang đầu";
$text['lastpage']="Trang cuối";
$text['photoowner']="Chủ sở hữu / Source";
$text['nocemetery']="Nghĩa trang";
$text['iptc005']="Tiêu đề";
$text['iptc020']="Danh mục phụ trợ";
$text['iptc040']="Hướng dẫn đặc biệt";
$text['iptc055']="Ngày tạo";
$text['iptc080']="Tác giả";
$text['iptc085']="Vị trí của tác giả";
$text['iptc090']="Thành phố";
$text['iptc095']="Nhà nước / tỉnh";
$text['iptc101']="Quốc gia";
$text['iptc103']="OTR";
$text['iptc105']="Tiêu đề";
$text['iptc110']="Source";
$text['iptc115']="Hình ảnh Source";
$text['iptc116']="Copyright Thông báo";
$text['iptc120']="Chú thích";
$text['iptc122']="Chú thích Writer";
$text['mapof']="Bản đồ";
$text['regphotos']="Mô tả View";
$text['gallery']="Hình thu nhỏ";
$text['cemphotos']="Nghĩa trang hình ảnh";
$text['photosize']="Kích thước";
        $text['iptc010']="Ưu tiên";
$text['filesize']="File Size";
$text['seeloc']="Xem Location";
$text['showall']="Hiện tất cả";
$text['editmedia']="Edit Media";
$text['viewitem']="Xem mục này";
$text['editcem']="Chỉnh sửa Nghĩa trang";
$text['numitems']="# Items";
$text['allalbums']="Tất cả Albums";
$text['slidestop']="Tạm dừng Slide Show";
$text['slideresume']="Tiếp tục Slide Show";
$text['slidesecs']="Giây cho mỗi slide:";
$text['minussecs']="Trừ 0,5 giây";
$text['plussecs']="Cộng với 0,5 giây";
$text['nocountry']="Không rõ đất nước";
$text['nostate']="Không rõ nhà nước";
$text['nocounty']="Không rõ county";
$text['nocity']="Không biết thành phố";
$text['nocemname']="Không rõ tên nghĩa trang";
$text['editalbum']="Chỉnh sửa Album";
$text['mediamaptext']="<strong> Lưu ý: </ strong> Di chuyển con trỏ chuột lên ảnh để hiển thị tên Nhấn vào đây để xem một trang cho mỗi tên";
//added in 8.0.0 
$text['allburials']="Tất cả mai táng";
$text['moreinfo']="Click để biết thêm thông tin về hình ảnh này";
//added in 9.0.0 
        $text['iptc025']="Từ khoá";
        $text['iptc092']="Vị trí phụ";
$text['iptc015']="Thể loại";
$text['iptc065']="Khởi tạo chương trình";
$text['iptc070']="Phiên bản chương trình";
break; 
 
//surnames.php, surnames100.php, surnames-all.php, surnames-oneletter.php 
case "surnames": 
case "places": 
$text['surnamesstarting']="Hiện họ bắt đầu với";
$text['showtop']="Hiển thị hàng đầu";
$text['showallsurnames']="Hiện tất cả họ";
$text['sortedalpha']="Được sắp xếp theo thứ tự abc";
$text['byoccurrence']="Sắp xếp bởi sự xuất hiện";
$text['firstchars']="Đầu tiên nhân vật";
$text['mainsurnamepage']="Chính họ trang";
$text['allsurnames']="Tất cả họ";
$text['showmatchingsurnames']="Bấm vào một tên họ để hiển thị bản ghi phù hợp";
$text['backtotop']="Quay lại đầu trang ";
$text['beginswith']="Bắt đầu với";
$text['allbeginningwith']="Tất cả họ bắt đầu với";
$text['numoccurrences']="Số của các địa phương tổng số trong dấu ngoặc đơn";
$text['placesstarting']="Hiển thị lớn nhất địa phương bắt đầu với";
$text['showmatchingplaces']="Bấm vào một nơi để hiển thị các địa phương nhỏ hơn Nhấp chuột vào biểu tượng tìm kiếm để hiển thị các cá nhân phù hợp.";
$text['totalnames']="Tổng số cá nhân";
$text['showallplaces']="Hiển thị tất cả các địa phương lớn nhất";
$text['totalplaces']="Tổng số địa điểm";
$text['mainplacepage']="Chính nơi trang";
$text['allplaces']="Tất cả các địa phương lớn nhất";
$text['placescont']="Hiển thị tất cả những nơi có chứa";
//changed in 8.0.0 
$text['top30']="Top xxx họ";
$text['top30places']="Top xxx địa phương lớn nhất";
break; 
 
//whatsnew.php 
case "whatsnew": 
$text['pastxdays']="(Qua xx ngày) ";
$text['historiesdocs']="Lịch sử & Tài liệu";
//$text['headstones'] =

$text['photo']="Ảnh";
$text['history']="Lịch sử / Document";
$text['husbid']="Cha ID";
$text['husbname']="Tên của Cha";
$text['wifeid']="Mẹ ID";
break; 
 
//timeline.php, timeline2.php 
case "timeline": 
$text['text_delete']="Xóa";
$text['addperson']="Thêm Người";
$text['nobirth']="Các cá nhân sau đây không có ngày sinh hợp lệ và không thể được thêm vào";
$text['event']="Sự kiện (s)";
$text['chartwidth']="Chart chiều rộng";
$text['timelineinstr']="Thêm nhân dân";
$text['togglelines']="Bật tắt Lines";
//changed in 9.0.0 
$text['noliving']="Các cá nhân sau đây được gắn cờ là sống hay tư nhân và không thể được thêm vào bởi vì bạn không đăng nhập với các điều khoản thích hợp";
break; 
 
//browsetrees.php 
//login.php, newacctform.php, addnewacct.php 
case "trees": 
case "login": 
$text['browsealltrees']="Duyệt tất cả các cây";
$text['treename']="Tree Name";
$text['owner']="Chủ sở hữu";
$text['address']="Địa chỉ";
$text['city']="Thành phố";
$text['state']="Nhà nước / tỉnh";
$text['zip']="Zip / Postal Code";
$text['country']="Quốc gia";
$text['email']="E-mail";
$text['phone']="Điện thoại";
$text['username']="Tên";
$text['password']="Mật khẩu";
$text['loginfailed']="Đăng nhập thất bại";
 
$text['regnewacct']="Đăng ký tài khoản người dùng mới";
$text['realname']="Tên thật của bạn";
$text['phone']="Điện thoại";
$text['email']="E-mail Address";
$text['address']="Địa chỉ";
$text['acctcomments']="Ghi chú hoặc Comments";
$text['submit']="Gửi";
$text['leaveblank']="(Để trống nếu có yêu cầu một cây mới) ";
$text['required']="Các trường bắt buộc";
$text['enterpassword']="Xin vui lòng nhập một mật khẩu";
$text['enterusername']="Xin vui lòng nhập tên người dùng.";
$text['failure']="Chúng tôi xin lỗi, nhưng tên người dùng bạn cho vào là đã được sử dụng Xin vui lòng sử dụng nút Back trên trình duyệt của bạn để trở lại trang trước và chọn một tên người dùng khác nhau.";
$text['success']="Cảm ơn bạn Chúng tôi đã nhận được đăng ký của bạn Chúng tôi sẽ liên lạc với bạn khi tài khoản của bạn đang hoạt động hoặc nếu cần thêm thông tin.";
$text['emailsubject']="New TNG người dùng đăng ký yêu cầu";
$text['enteremail']="Xin vui lòng nhập một địa chỉ e-mail hợp lệ.";
$text['website']="Web Site";
$text['nologin']="Không có một đăng nhập";
$text['loginsent']="Đăng nhập thông tin được gửi";
$text['loginnotsent']="Đăng nhập thông tin không được gửi";
$text['enterrealname']="Hãy nhập tên thật của bạn";
$text['rempass']="Giữ đăng nhập trên máy tính này";
$text['morestats']="Thống kê";
$text['accmail']="<strong> Chú ý: </ strong> để nhận được thư từ các quản trị viên trang web liên quan đến tài khoản của bạn, hãy chắc chắn rằng bạn đang không chặn thư từ tên miền này";
$text['newpassword']="Mật khẩu mới";
$text['resetpass']="Thiết lập lại mật khẩu của bạn";
$text['nousers']="Hình thức này không thể được sử dụng cho đến khi ít nhất một người sử dụng kỷ lục tồn tại Nếu bạn là chủ sở hữu trang web, xin vui lòng đi Hồ / Người dùng để tạo ra các tài khoản quản trị của bạn.";
$text['noregs']="Chúng tôi xin lỗi, nhưng chúng tôi không chấp nhận người dùng đăng ký mới tại thời điểm này href=\";suggest.php\";> <a liên hệ với chúng tôi </ a> trực tiếp nếu bạn có ý kiến ​​hay câu hỏi liên quan đến bất cứ điều gì trên trang web này. ";
//changed in 8.0.0 
$text['emailmsg']="Bạn đã nhận được một yêu cầu mới cho một tài khoản người dùng TNG Xin vui lòng đăng nhập vào khu vực quản lý của bạn TNG và gán quyền thích hợp để tài khoản mới này.";
$text['accactive']="Tài khoản này đã được kích hoạt, nhưng người sử dụng sẽ không có quyền đặc biệt cho đến khi bạn gán cho chúng.";
$text['accinactive']="Tới Hồ / Users / Xem xét để truy cập các thiết lập tài khoản tài khoản sẽ vẫn không hoạt động cho đến khi bạn chỉnh sửa và lưu các bản ghi ít nhất một lần.";
$text['pwdagain']="Mật khẩu một lần nữa";
$text['enterpassword2']="Xin vui lòng nhập mật khẩu của bạn một lần nữa.";
$text['pwdsmatch']="Mật khẩu của bạn không phù hợp với Xin vui lòng nhập lại mật khẩu trong từng lĩnh vực.";
//added in 8.0.0 
$text['acksubject']="Cảm ơn bạn đã đăng ký"; // cho một tài khoản người dùng mới
$text['ackmessage']="Yêu cầu cho một tài khoản người dùng của bạn đã nhận được tài khoản của bạn sẽ không hoạt động cho đến khi nó đã được xem xét bởi người quản trị trang web Bạn sẽ được thông báo bằng email khi đăng nhập của bạn đã sẵn sàng để sử dụng.";
break; 
 
//statistics.php 
case "stats": 
$text['quantity']="Số lượng";
$text['totindividuals']="Tổng số cá nhân";
$text['totmales']="Tổng số nam";
$text['totfemales']="Tổng số nữ";
$text['totunknown']="Tổng số người";
$text['totliving']="Tổng số còn sống";
$text['totfamilies']="Tổng số gia đình";
$text['totuniquesn']="Tổng số lượng họ";
//$text['totphotos']="Tổng số hình ảnh";
//$text['totdocs']="Tổng số lịch sử & Tài liệu";
//$text['totheadstones']="Tổng bia mộ";
$text['totsources']="Tổng nguồn";
$text['avglifespan']="Trung bình Tuổi thọ";
$text['earliestbirth']="Sinh sớm nhất";
$text['longestlived']="Sống lâu nhất";
$text['years']="Năm";
$text['days']="Ngày";
$text['age']="Age";
$text['agedisclaimer']="Tính toán liên quan đến tuổi được dựa trên ngày sinh và ngày mất. Do sự tồn tại của trường ngày không đầy đủ (ví dụ như, một ngày mất được liệt kê chỉ là \"; 1945 \";hoặc \"; BEF 1860 \";), những tính toán này không thể chính xác 100%";
$text['treedetail']="Thông tin thêm về cây này";
$text['total']="Tổng";
break; 
 
case "notes": 
$text['browseallnotes']="Browse All Notes";
break; 
 
case "help": 
$text['menuhelp']="Menu chính";
break; 
 
case "install": 
$text['perms']="Permissions tất cả được thiết lập.";
$text['noperms']="Quyền không thể được thiết lập cho những tập tin này:";
$text['manual']="Xin hãy đặt chúng bằng tay.";
$text['folder']="Folder";
$text['created']="Đã được tạo";
$text['nocreate']="Không thể được tạo ra tạo ra nó bằng tay.";
$text['infosaved']="Thông tin lưu, kết nối kiểm tra!";
$text['tablescr']="Các bảng đã được tạo ra!";
$text['notables']="Các bảng sau đây không thể được tạo ra: ";
$text['nocomm']="TNG không giao tiếp với cơ sở dữ liệu của bạn Không có bảng nào được tạo ra.";
$text['newdb']="Thông tin lưu, kết nối kiểm tra, cơ sở dữ liệu mới được tạo ra:";
$text['noattach']="Thông tin lưu kết nối và cơ sở dữ liệu được tạo ra, nhưng TNG không thể đính kèm với nó.";
$text['nodb']="Thông tin lưu kết nối thực hiện, nhưng cơ sở dữ liệu không tồn tại và không thể được tạo ra ở đây Xin vui lòng xác minh rằng tên cơ sở dữ liệu là chính xác, hoặc sử dụng bảng điều khiển để tạo ra nó.";
$text['noconn']="Thông tin lưu nhưng kết nối không thành công Một hoặc nhiều điều sau đây là không chính xác:";
$text['exists']="Đã tồn tại";
$text['loginfirst']="Bạn phải đăng nhập đầu tiên.";
$text['noop']="Không có hoạt động được thực hiện";
//added in 8.0.0 
$text['nouser']="Người sử dụng đã không được tạo ra Tên đăng nhập có thể đã tồn tại.";
$text['notree']="Cây đã không được tạo ra Tree ID đã có thể tồn tại.";
$text['infosaved2']="Thông tin lưu";
$text['renamedto']="Đổi tên thành";
$text['norename']="Không thể được đổi tên thành";
break; 
 
case "imgviewer": 
$text['zoomin']="Phóng to";
$text['zoomout']="Zoom Out";
$text['magmode']="Phóng đại Mode";
$text['panmode']="Pan Mode";
$text['pan']="Nhấn và kéo để di chuyển trong hình ảnh";
$text['fitwidth']="Fit Width";
$text['fitheight']="Fit Chiều cao";
$text['newwin']="New Window";
$text['opennw']="Open hình ảnh trong một cửa sổ mới";
$text['magnifyreg']="Nhấn vào đây để phóng to một khu vực của hình ảnh ";
$text['imgctrls']="Kích hoạt tính năng kiểm soát hình ảnh";
$text['vwrctrls']="Kích hoạt tính năng kiểm soát xem hình ảnh";
$text['vwrclose']="Close Image Viewer";
break; 
} 
 
//common 
$text['matches']="Các kết quả phù hợp";
$text['description']="Mô tả";
$text['notes']="Ghi chú";
$text['status']="Tình trạng";
$text['newsearch']="Tìm kiếm mới";
$text['pedigree']="Pedigree";
$text['birthabbr']="B";
$text['chrabbr']="C";
$text['seephoto']="Xem ảnh";
$text['andlocation']="địa điểm";
$text['accessedby']="truy cập bằng";
$text['go']="Đi";
$text['family']="Gia đình"; // từ getPerson
$text['children']="Con ruột"; // từ getPerson
$text['tree']="Cây";
$text['alltrees']="Tất cả cây";
$text['nosurname']="Không có họ";
$text['thumb']="Hình nhỏ"; // như trong Hình thu nhỏ
$text['people']="Con người";
$text['title']="Title"; // từ getPerson
$text['suffix']="Hậu tố"; // từ getPerson
$text['nickname']="Tên hiệu"; // từ getPerson
$text['deathabbr']="D"; // từ hạ xuống
$text['lastmodified']="Sửa đổi lần cuối "; // từ getPerson
$text['married']="Married"; // từ getPerson
//$text['photos']="Hình ảnh";
$text['name']="Tên"; // từ showmap
$text['lastfirst']="Họ, Tên Given (s)"; // từ tìm kiếm
$text['bornchr']="Năm sinh / rửa tội"; // từ tìm kiếm
$text['individuals']="Cá nhân"; // từ gì mới
$text['families']="Gia đình";
$text['personid']="Mã cá nhân";
$text['sources']="Nguồn"; // từ getPerson (bên cạnh một số)
$text['unknown']="Không biết";
$text['father']="Cha";
$text['mother']="Mẹ";
$text['christened']="Christened";
$text['died']="Năm mất";
$text['buried']="Chôn";
$text['spouse']="Vợ, chồng"; // từ tìm kiếm
$text['parents']="Cha mẹ"; // từ phả hệ
$text['text']="Văn bản"; // từ các nguồn
$text['language']="Ngôn ngữ"; // từ các ngôn ngữ
$text['burialabbr']="Bur."; // Từ hạ xuống
$text['descendchart']="Descendancy";
$text['extractgedcom']="GEDCOM";
$text['indinfo']="Cá nhân";
$text['edit']="Chỉnh sửa";
$text['date']="Ngày";
$text['place']="Place";
$text['login']="Đăng nhập";
$text['logout']="Đăng xuất";
$text['marrabbr']="M";
$text['groupsheet']="Chi tiết gia đình";
$text['text_and']="Và";
$text['generation']="Thế hệ";
$text['filename']="File name";
$text['id']="ID";
$text['search']="Tìm kiếm";
$text['user']="Thành viên";
$text['firstname']="Tên";
$text['lastname']="Họ, tên đệm";
$text['searchresults']="Kết quả tìm kiếm";
$text['diedburied']="Chết / Buried";
$text['homepage']="Trang chủ";
$text['find']="Tìm kiếm ...";
$text['relationship']="Mối quan hệ"; // bằng tiếng Đức, Verwandtschaft
$text['relationship2']="Mối quan hệ"; // trong một số ngôn ngữ khác nhau, ít nhất là trong Đức (Beziehung)
$text['timeline']="Thời gian biểu";
$text['yesabbr']="Y"; // ​​tên viết tắt của 'có'
$text['divorced']="Ly hôn";
$text['indlinked']="Liên kết";
$text['branch']="Chi nhánh";
$text['moreind']="Cá nhân";
$text['morefam']="Gia đình";
$text['source']="Source";
$text['surnamelist']="Danh sách họ";
$text['generations']="Thế hệ";
$text['refresh']="Làm mới";
$text['whatsnew']="Tin mới";
$text['reports']="Báo cáo";
$text['placelist']="Danh sách địa điểm";
$text['baptizedlds']="Rửa tội (LDS)";
$text['endowedlds']="Ưu đãi (LDS)";
$text['sealedplds']="Sealed P (LDS)";
$text['sealedslds']="Sealed S (LDS)";
//$text['photoshistories']="Photos & lịch sử";
$text['ancestors']="Tổ tiên";
$text['descendants']="Hậu duệ";
//$text['sex']="Sex";
$text['lastimportdate']="Ngày nhập GEDCOM cuối";
$text['type']="Type";
$text['savechanges']="Lưu thay đổi";
$text['familyid']="ID Gia đình";
$text['headstone']="Bia mộ";
$text['historiesdocs']="Lịch sử";
$text['anonymous']="Vô danh";
$text['places']="Địa điểm";
$text['anniversaries']="Thời gian và ngày kỷ niệm";
$text['administration']="Quản trị";
$text['help']="Trợ giúp";
//$text['documents']="Tài liệu";
$text['year']="Năm";
$text['all']="Tất cả";
$text['repository']="Kho";
$text['address']="Địa chỉ";
$text['suggest']="Đề nghị";
$text['editevent']="Đề xuất thay đổi cho sự kiện này";
$text['findplaces']="Tìm tất cả các cá nhân với các sự kiện tại địa điểm này ";
$text['morelinks']="Liên kết";
$text['faminfo']="Gia đình Thông tin";
$text['persinfo']="Thông tin cá nhân";
$text['srcinfo']="Nguồn thông tin";
$text['fact']="Thực tế";
$text['goto']="Chọn một trang";
$text['tngprint']="In";
$text['databasestatistics']="Thống kê"; // cần thiết để được ngắn hơn để phù hợp trên menu
$text['child']="Con cái"; // từ familygroup
$text['repoinfo']="Repository Thông tin";
$text['tng_reset']="Đặt lại";
$text['noresults']="Không có kết quả được tìm thấy";
$text['allmedia']="Tất cả các media";
$text['repositories']="Kho";
$text['albums']="Album";
$text['cemeteries']="Nghĩa trang";
$text['surnames']="Họ, tên đệm";
$text['dates']="Ngày";
$text['link']="Link";
$text['media']="Media";
$text['gender']="Giới tính";
$text['latitude']="Latitude";
$text['longitude']="Kinh độ";
$text['bookmarks']="Các đánh dấu";
$text['bookmark']="Đánh dấu";
$text['mngbookmarks']="Đến mục đánh dấu";
$text['bookmarked']="Đánh dấu thêm";
$text['remove']="Hủy bỏ";
$text['find_menu']="Tìm kiếm";
$text['info']="Thông tin"; // này cần phải là một từ viết tắt rất ngắn
$text['cemetery']="Nghĩa trang";
$text['gmapevent']="Sự kiện Bản đồ";
$text['gevents']="Sự kiện";
$text['glang']="& Hl=en";
$text['googleearthlink']="Google Earth";
$text['googlemaplink']="Google Maps";
$text['gmaplegend']="Pin Legend";
$text['unmarked']="Đánh dấu";
$text['located']="Nằm";
$text['albclicksee']="Nhấn vào đây để xem tất cả các mục trong album này";
$text['notyetlocated']="Chưa đặt";
$text['cremated']="Hỏa thiêu";
$text['missing']="Missing";
$text['page']="Page";
$text['pdfgen']="PDF Generator";
$text['blank']="Blank Chart";
$text['none']="Không";
$text['fonts']="Fonts";
$text['header']="Tiêu đề";
$text['data']="Dữ liệu";
$text['pgsetup']="Page Setup";
$text['pgsize']="Page Size";
$text['orient']="Định hướng"; // cho một trang
$text['portrait']="Chân dung";
$text['landscape']="Cảnh quan";
$text['tmargin']="Top Margin";
$text['bmargin']="Bottom Margin";
$text['lmargin']="Left Margin";
$text['rmargin']="Right Margin";
$text['createch']="Tạo Chart";
$text['prefix']="Tiền tố";
$text['mostwanted']="Nổi bật nhất";
$text['latupdates']="Thông tin mới nhất";
$text['featphoto']="Hình ảnh nổi bật";
$text['news']="Tin tức";
$text['ourhist']="Lịch sử gia đình của chúng tôi";
$text['ourhistanc']="Lịch sử Gia đình và Tổ tiên";
$text['ourpages']="Our Family Genealogy Pages";
$text['pwrdby']="Trang web này được hỗ trợ bởi";
$text['writby']="Được tạo bởi";
$text['searchtngnet']="Tìm kiếm TNG Network (GENDEX)";
$text['viewphotos']="Xem tất cả các hình ảnh ";
$text['anon']="Bạn đang vô danh";
$text['whichbranch']="Chi nhánh là từ đâu?";
$text['featarts']="Tính năng bài viết";
$text['maintby']="Duy trì bởi";
$text['createdon']="Khởi tạo lúc";
$text['reliability']="Đáng tin cậy";
$text['labels']="Nhãn";
$text['inclsrcs']="Bao gồm nguồn";
$text['cont']="(Tiếp theo) "; // viết tắt cho tiếp tục
$text['mnuheader']="Trang chủ";
$text['mnusearchfornames']="Tìm kiếm";
$text['mnulastname']="Họ, tên đệm";
$text['mnufirstname']="Tên";
$text['mnusearch']="Tìm kiếm";
$text['mnureset']="Bắt đầu lại";
$text['mnulogon']="Đăng nhập";
$text['mnulogout']="Đăng xuất";
$text['mnufeatures']="Các tính năng khác";
$text['mnuregister']="Đăng ký";
$text['mnuadvancedsearch']="Tìm kiếm nâng cao";
$text['mnulastnames']="Họ, tên đệm";
$text['mnustatistics']="Thống kê";
$text['mnuphotos']="Hình ảnh";
$text['mnuhistories']="Lịch sử";
$text['mnumyancestors']="Ảnh & lịch sử cho tổ tiên của [Người]";
$text['mnucemeteries']="Nghĩa trang";
$text['mnutombstones']="Bia mộ";
$text['mnureports']="Báo cáo";
$text['mnusources']="Nguồn";
$text['mnuwhatsnew']="Tin mới";
$text['mnushowlog']="Thông tin truy cập";
$text['mnulanguage']="Thay đổi Ngôn ngữ";
$text['mnuadmin']="Quản trị";
$text['welcome']="Chào mừng";
$text['contactus']="Liên hệ";
//changed in 8.0.0 
$text['born']="Năm sinh";
$text['searchnames']="Tìm kiếm tên";
//added in 8.0.0 
$text['editperson']="Chỉnh sửa thành viên";
$text['loadmap']="Tải bản đồ";
$text['birth']="Sinh nhật";
$text['wasborn']="Được sinh ra";
$text['startnum']="Đầu tiên Số";
$text['searching']="Tìm kiếm";
//moved here in 8.0.0 
$text['location']="Location";
$text['association']="Hiệp hội";
$text['collapse']="Sụp đổ";
$text['expand']="Mở rộng";
$text['plot']="Plot";
$text['searchfams']="Tìm kiếm gia đình";
//added in 8.0.2 
$text['wasmarried']="Married";
$text['anddied']="Mất";
//added in 9.0.0 
$text['share']="Chia sẻ";
$text['hide']="Ẩn";
$text['disabled']="Tài khoản người dùng của bạn đã bị vô hiệu hoá Xin vui lòng liên hệ với người quản trị trang web để biết thêm thông tin.";
$text['contactus_long']="Nếu bạn có bất kỳ câu hỏi hoặc ý kiến ​​về những thông tin trên trang web này, xin vui lòng <span class=\";emphasis\";> <a href=\";suggest.php\";> liên hệ với chúng tôi </ a> </ span>. mong được nghe từ bạn.";
$text['features']="Các tính năng";
$text['resources']="Tài nguyên";
$text['latestnews']="Tin mới nhất";
$text['trees']="Cây";
$text['wasburied']="Được chôn";
//moved here in 9.0.0 
$text['emailagain']="Lặp lại Email";
$text['enteremail2']="Xin vui lòng nhập địa chỉ email của bạn một lần nữa.";
$text['emailsmatch']="Email của bạn không phù hợp với Xin vui lòng nhập địa chỉ email tương tự trong từng lĩnh vực.";
$text['getdirections']="Nhấn vào đây để nhận được hướng dẫn";
$text['calendar']="Lịch";
//changed in 9.0.0 
$text['directionsto']="Đến";
$text['slidestart']="Slide Show";
$text['livingnote']="";
$text['livingphoto']="";
$text['waschristened']="Được đặt tên thánh";
//custom text
$text['customtitle'] = "Tên theo yêu cầu";	//TODO
$text['customhighlightstitle'] = "Phả Hệ Tiêu Biểu";
$text['descendof'] = "Con cháu cụ";

@include_once(";captcha_text.php");
@include_once(";alltext.php");
if(!$alltextloaded) getAllTextPath();
?>
