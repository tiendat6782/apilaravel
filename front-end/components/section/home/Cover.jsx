"use client";

import { Button } from "@/components/ui/button";
import { ChevronLeft, ChevronRight } from "lucide-react";
import { AnimatePresence, motion } from "framer-motion";
import { useState } from "react";
import { wrap } from "popmotion";
import { images } from "@/constants/images";

const Cover = () => {
  const variants = {
    enter: (direction) => {
      return {
        x: direction > 0 ? 1000 : -1000,
        opacity: 0,
      };
    },
    center: {
      zIndex: 1,
      x: 0,
      opacity: 1,
    },
    exit: (direction) => {
      return {
        zIndex: 0,
        x: direction < 0 ? 1000 : -1000,
        opacity: 0,
      };
    },
  };
  const [[page, pageDirection], setPage] = useState([0, 0]);
  const imageIndex = wrap(0, images.length, page);
  const paginate = (newDirection) => {
    setPage([page + newDirection, newDirection]);
  };
  return (
    <>
      <div className="relative h-[600px] w-full overflow-hidden rounded-md">
        <AnimatePresence initial={false} custom={pageDirection}>
          <motion.img
            variants={variants}
            key={page}
            initial="enter"
            animate="center"
            custom={pageDirection}
            exit="exit"
            transition={{
              x: { duration: 1, type: "spring" },
              opacity: { duration: 0.2 },
            }}
            src={images[imageIndex]}
            alt="shoes"
            className="absolute top-0 h-[600px] w-full max-w-[100vw] object-cover"
          />
          <div className="flex_between absolute top-1/2 z-10 mx-auto mt-3 w-full -translate-y-1/2 px-2">
            <Button
              variant="outline"
              size="icon"
              className="click rounded-full bg-slate-50"
              onClick={() => {
                paginate(-1);
              }}
            >
              <ChevronLeft className="text_primary" />
            </Button>
            <Button
              variant="outline"
              size="icon"
              className="click rounded-full bg-slate-50"
              onClick={() => {
                paginate(1);
              }}
            >
              <ChevronRight className="text_primary" />
            </Button>
          </div>
        </AnimatePresence>
      </div>
      {/* <div className="pointer-events-none absolute left-1 top-1/3 flex cursor-none flex-col gap-2 overflow-hidden">
          <motion.p
            initial="enter"
            animate="center"
            exit="exit"
            variants={variants}
            transition={{
              x: { duration: 2, type: "spring", delay: 0.3 },
              opacity: { duration: 0.5 },
            }}
            className="text_primary text-xl font-semibold"
          >
            Bộ sưu tập giày mới
          </motion.p>
          <Link
            href="/product"
            className="flex_start text_secondary flex-auto rounded-2xl"
          >
            {" "}
            Khám phá
            <ChevronRight className="w-5 text-slate-600" />
          </Link>
        </div> */}
    </>
  );
};

export default Cover;
