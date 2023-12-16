import React from "react";
import MobileNav from "./MobileNav";
import { ModeToggle } from "../ModeToggle";
import GlobalSearch from "../search/GlobalSearch";
import { ShoppingCart, User } from "lucide-react";
import Link from "next/link";

const Navbar = () => {
  return (
    <>
      <nav className="flex_between p-3">
        {" "}
        <div className="flex_start">
          {" "}
          <MobileNav />
          <ModeToggle />
          <GlobalSearch />
        </div>
        <Link href="/" className="font-bold">
          Ruby Store
        </Link>
        <div className="flex_between">
          <User className="text_primary h-5 w-5" />
          <ShoppingCart className="text_primary h-5 w-5" />
        </div>
      </nav>
    </>
  );
};

export default Navbar;
