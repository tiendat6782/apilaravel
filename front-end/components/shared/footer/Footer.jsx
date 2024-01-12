import React from "react";
import Link from "next/link";

const footerLinks = [
  {
    title: "Sản phẩm",
    links: [
      { title: "Giày thể thao", href: "#" },
      { title: "Giày cầu lông", href: "#" },
      { title: "Giày đi bộ", href: "#" },
      { title: "Giày bóng đá", href: "#" },
      { title: "Giày thời trang", href: "#" },
    ],
  },

  {
    title: "Dành cho bạn",
    links: [
      { title: "Đăng nhập", href: "/login" },
      { title: "Đăng ký", href: "#" },
      { title: "Liên hệ", href: "/contact" },
    ],
  },
];
const Footer = () => {
  return (
    <footer className=" border_t_primary mt-12 w-full p-3 py-6 text-sm">
      <div className="flex flex-col justify-between lg:flex-row">
        <div className="flex h-full items-center justify-between gap-1 md:flex-row">
          <Link href="/" className="flex_start">
            logo
            <p className="text_primary text-lg font-semibold">Ruby store</p>
          </Link>
        </div>
        <div className="mt-5 flex flex-wrap justify-between">
          {footerLinks.map((col, index) => (
            <div key={index} className="min-w-[18rem]">
              <h3 className="text_secondary mb-3 font-semibold">{col.title}</h3>
              <ul className="">
                {col.links.map((link) => (
                  <li className="mb-3" key={link.title}>
                    <Link
                      className="text_tertiary hover:underline "
                      href={link.href}
                    >
                      {link.title}
                    </Link>
                  </li>
                ))}
              </ul>
            </div>
          ))}
        </div>
      </div>
    </footer>
  );
};

export default Footer;
