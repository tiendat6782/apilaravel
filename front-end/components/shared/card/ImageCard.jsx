import Image from "next/image";
import React from "react";
import classNames from "classnames";

const ImageCard = ({ imgSrc, extraClass }) => {
  return (
    <div
      className={classNames(
        "h-[300px] w-full overflow-hidden cursor-pointer relative ",
        extraClass
      )}
    >
      {" "}
      <Image
        className="h-full w-full object-cover object-center  "
        alt="shoes"
        width={1000}
        height={1000}
        src={imgSrc}
      />
      <div className="absolute left-0 top-0 flex h-full w-full items-center justify-center bg-slate-900/50 opacity-0 backdrop-blur transition-all duration-500 hover:opacity-100">
        <p className="text-lg font-semibold text-slate-50">category</p>
      </div>
    </div>
  );
};

export default ImageCard;
