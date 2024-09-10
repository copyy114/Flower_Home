// ตั้งค่าคุกกี้
document.cookie = "mycookie=value; SameSite=None; Secure; path=/; max-age=" + (60 * 60 * 24 * 30); // คุกกี้จะหมดอายุหลังจาก 30 วัน

// อ่านคุกกี้
function getCookie(name) {
    let value = "; " + document.cookie;
    let parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}

console.log(getCookie("username")); // ค้นหาค่าของคุกกี้ 'username'

